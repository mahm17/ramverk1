<?php

namespace Anax\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class WeatherJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet() : array
    {
        $this->api = require ANAX_INSTALL_PATH . "/config/keys.php";
        $address = $this->di->get("request")->getGet("address");
        $curl = $this->di->get("curl");
        $curl->getIpData($address, $this->api["ip_key"]);
        $curl->getWeatherData($this->api["weather_key"]);
        $resOne = $curl->weatherData;
        $resTwo = $curl->ipData;

        if (sizeOf($resOne) == 2) {
            $json = [
                "error" => $resOne["error"],
            ];

            return [$json];
        } else {
            $json = [
                "ip_data" => $resTwo,
                "daily_weather" => $resOne["daily"]["data"],
            ];

            return [$json];
        }
    }
}
