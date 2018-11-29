<?php

namespace Anax\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

class WeatherJsonControllerTest extends TestCase
{
    // Create the di container.
    protected $di;
    protected $controller;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new WeatherJsonController();
        $this->controller->setDI($this->di);
    }

    public function testIndexActionGet()
    {
        $this->di->get("request")->setGet("address", "193.11.186.208");
        $get = $this->di->get("request")->getGet("address");
        $this->assertEquals($get, "193.11.186.208");

        $res = $this->controller->indexActionGet();
        $this->assertInternalType("array", $res);
    }

    public function testNotValidIp()
    {
        $this->di->get("request")->setGet("address", "test");
        $get = $this->di->get("request")->getGet("address");
        $this->assertEquals($get, "test");

        $res = $this->controller->indexActionGet();
        $this->assertInternalType("array", $res);

        $json = $res[0];
        $exp = "The given location (or time) is invalid";
        $this->assertContains($exp, $json["error"]);
    }
}
