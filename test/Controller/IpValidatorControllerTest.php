<?php

namespace Anax\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpValidatorControllerTest extends TestCase
{
    protected $di;
    protected $controller;

    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        $this->controller = new IpValidatorController();
        $this->controller->setDI($this->di);
    }

    public function testIndexAction()
    {
        $res = $this->controller->indexAction();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        $body = $res->getBody();
        $exp = "| ramverk1</title>";
        $this->assertContains($exp, $body);
    }

    public function testValidateActionWithIpv4()
    {
        $this->di->get("request")->setPost("address", "192.168.0.0");
        $get = $this->di->get("request")->getPost("address");
        $this->assertEquals($get, "192.168.0.0");

        $res = $this->controller->validateAction();
        $body = $res->getBody();
        $exp = "is a valid IPv4 address</p>";
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $this->assertContains($exp, $body);
    }

    public function testValidateActionWithoutIpv4()
    {

        $res = $this->controller->validateAction();
        $body = $res->getBody();
        $exp = "is not a valid IPv4 address</p>";
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $this->assertContains($exp, $body);
    }

    public function testValidateActionWithIpv6()
    {
        $this->di->get("request")->setPost("address", "1200:0000:AB00:1234:0000:2552:7777:1313");
        $get = $this->di->get("request")->getPost("address");
        $this->assertEquals($get, "1200:0000:AB00:1234:0000:2552:7777:1313");

        $res = $this->controller->validateAction();
        $body = $res->getBody();
        $exp = "is a valid IPv6 address</p>";
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $this->assertContains($exp, $body);
    }

    public function testValidateActionWithoutIpv6()
    {
        $res = $this->controller->validateAction();
        $body = $res->getBody();
        $exp = "is not a valid IPv6 address</p>";
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $this->assertContains($exp, $body);
    }
}
