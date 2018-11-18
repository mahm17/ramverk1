<?php

namespace Anax\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class JsonControllerTest extends TestCase
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
        $this->controller = new JsonController();
        $this->controller->setDI($this->di);
    }

    public function testIndexActionGetValidIp()
    {
        $this->di->get("request")->setGet("address", "192.168.0.0");
        $get = $this->di->get("request")->getGet("address");
        $this->assertEquals($get, "192.168.0.0");

        $res = $this->controller->indexActionGet();
        $this->assertInternalType("array", $res);

        $json = $res[0];
        $exp = "192.168.0.0";
        $this->assertContains($exp, $json["address"]);
    }

    public function testIndexActionGetNotValidIp()
    {
        $this->di->get("request")->setGet("address", "1200:0000:AB00:1234:0000:2552:7777:1313");
        $get = $this->di->get("request")->getGet("address");
        $this->assertEquals($get, "1200:0000:AB00:1234:0000:2552:7777:1313");

        $res = $this->controller->indexActionGet();
        $this->assertInternalType("array", $res);

        $json = $res[0];
        $exp = "1200:0000:AB00:1234:0000:2552:7777:1313";
        $this->assertContains($exp, $json["address"]);
    }
}
