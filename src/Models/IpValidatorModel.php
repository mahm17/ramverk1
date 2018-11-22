<?php

namespace Anax\Models;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class IpValidatorModel implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    private $key = "dad69a7f7d97fbb294571c08291110d7";
    public $result= [];

    public function validateIp($address)
    {
        $curl = curl_init('http://api.ipstack.com/' . $address . '?access_key=' . $this->key . '');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($curl);
        curl_close($curl);

        // Decode JSON response:
        $this->result = json_decode($json, true);

        return $this->result;
    }
}
