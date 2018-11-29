<?php

namespace Anax\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : object
    {
        $title = "Väder data";

        $page = $this->di->get("page");

        $page->add("weather/weather");

        return $page->render([
            "title" => $title,
        ]);
    }

    public function validateAction() : object
    {
        $title = "Väder";
        $this->api = require ANAX_INSTALL_PATH . "/config/keys.php";
        $this->address = $this->di->get("request")->getPost("address");
        $page = $this->di->get("page");
        $curl = $this->di->get("curl");

        $curl->getIpData($this->address, $this->api["ip_key"]);
        $curl->getWeatherData($this->api["weather_key"]);

        $resOne = $curl->weatherData;
        $resTwo = $curl->ipData;
        $map = $curl->map;

        $page->add("weather/weather_data", [
            "resOne" => $resOne,
            "resTwo" => $resTwo,
            "map" => $map,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }
}
