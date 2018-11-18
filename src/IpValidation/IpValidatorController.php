<?php

namespace Anax\IpValidation;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class IpValidatorController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * @var string $address the variable that holds the IP-address
     */
    public $address = "0";

    /**
     * Display the validator
     *
     * @return object
     */
    public function indexAction() : object
    {
        $title = "Ip-Validering";

        $page = $this->di->get("page");

        $page->add("ip/index");

        return $page->render([
            "title" => $title,
        ]);
    }

    public function validateAction() : object
    {
        $title = "Validerad";

        $this->address = $this->di->get("request")->getPost("address");
        $page = $this->di->get("page");

        if (filter_var($this->address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipv4 = "$this->address is a valid IPv4 address";
        } else {
            $ipv4 = "$this->address is not a valid IPv4 address";
        }

        if (filter_var($this->address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipv6 = "$this->address is a valid IPv6 address";
        } else {
            $ipv6 = "$this->address is not a valid IPv6 address";
        }

        if (isset($this->address)) {
            $domain = "Domännamnet: " . gethostbyaddr($this->address);
        } else {
            $domain = "Finns inget domännamn.";
        }

        $resOne = $ipv4;
        $resTwo = $ipv6;

        $res = [$resOne, $resTwo, $domain];

        $page->add("ip/validated", [
            "res" => $res,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }
}
