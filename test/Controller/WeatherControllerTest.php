<?php

namespace Anax\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

class WeatherControllerTest extends TestCase
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

        $this->controller = new WeatherController();
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
        $this->di->get("request")->setPost("address", "193.11.186.208");
        $get = $this->di->get("request")->getPost("address");
        $this->assertEquals($get, "193.11.186.208");

        $res = $this->controller->validateAction();
        $body = $res->getBody();
        $exp = "193.11.186.208</p>";
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        $this->assertContains($exp, $body);
    }
}
