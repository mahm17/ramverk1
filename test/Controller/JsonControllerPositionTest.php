<?php

namespace Anax\IpValidation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class JsonPositionControllerTest extends TestCase
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
        $this->controller = new JsonPositionController();
        $this->controller->setDI($this->di);
    }

    public function testIndexActionGet()
    {
        $this->di->get("request")->setGet("ip", "193.11.186.208");
        $get = $this->di->get("request")->getGet("ip");
        $this->assertEquals($get, "193.11.186.208");

        $res = $this->controller->indexActionGet();
        $this->assertInternalType("array", $res);

        // $exp = "193.11.186.208";
        // $this->assertContains($exp, $res[0]["ip"]);
    }
}
