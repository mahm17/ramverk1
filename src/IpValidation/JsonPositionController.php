<?php

namespace Anax\IpValidation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class JsonPositionController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet() : array
    {
        $address = $this->di->get("request")->getGet("address");

        $model = new \Anax\Models\IpValidatorModel();
        $model->validateIp($address);

        $res = $model->result;

        $json = [
            "result" => $res,
        ];

        return [$json];
    }
}
