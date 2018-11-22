<?php

namespace Anax\IpValidation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class JsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet() : array
    {
        $address = $this->di->get("request")->getGet("address");

        if (filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipv4 = [
                "address" => $address . " is a valid IPv4 address",
            ];
        } else {
            $ipv4 = [
                "address" => $address . " is not a valid Ipv4 address",
            ];
        }

        if (filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipv6 = [
                "address" => $address . " is a valid IPv6 address",
            ];
        } else {
            $ipv6 = [
                "address" => $address . " is not a valid Ipv6 address",
            ];
        }

        if (isset($address)) {
            $domain = "Domain name: " . gethostbyaddr($address);
        }

        $resOne = $ipv4;
        $resTwo = $ipv6;

        $json = [
            "address" => $address,
            "IPv4" => $resOne,
            "IPv6" => $resTwo,
            "domain" => $domain,
        ];

        return [$json];
    }
}
