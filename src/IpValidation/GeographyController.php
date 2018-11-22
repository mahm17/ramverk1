<?php

namespace Anax\IpValidation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class GeographyController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * @var string $address the variable that holds the IP-address
     */
    public $address = "0";

    public function indexAction() : object
    {
        $title = "Ip-Validering position";

        $page = $this->di->get("page");

        $page->add("ip/ip_validator");

        return $page->render([
            "title" => $title,
        ]);
    }

    public function validateAction() : object
    {
        $title = "Validerad";

        $this->address = $this->di->get("request")->getPost("address");
        $page = $this->di->get("page");

        $model = new \Anax\Models\IpValidatorModel();
        $model->validateIp($this->address);

        $res = $model->result;

        $page->add("ip/position", [
            "res" => $res,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }
}
