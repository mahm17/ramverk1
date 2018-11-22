<?php

namespace Anax\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeographyControllerTest extends TestCase
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

        $this->controller = new GeographyController();
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

    public function testValidateAction()
    {
        $this->di->get("request")->setPost("address", "192.168.0.0");
        $get = $this->di->get("request")->getPost("address");
        $this->assertEquals($get, "192.168.0.0");

        $res = $this->controller->validateAction();
        $body = $res->getBody();
        $exp = "<p>IP-address: 192.168.0.0 </p>";
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $this->assertContains($exp, $body);
    }
}
