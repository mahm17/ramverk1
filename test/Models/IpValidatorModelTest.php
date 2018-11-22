<?php

namespace Anax\Models;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpValidatorControllerTest extends TestCase
{
    protected $di;
    protected $model;

    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        $this->model = new IpValidatorModel();
        $this->model->setDI($this->di);
    }

    public function testValidateIp()
    {
        $this->di->get("request")->setGet("ip", "193.11.186.208");
        $get = $this->di->get("request")->getGet("ip");
        $this->assertEquals($get, "193.11.186.208");

        $this->model->validateIp("193.11.186.208");
        // $exp = "193.11.186.208";
        // $this->assertContains($exp, $res["ip"]);
    }
}
