<?php

namespace Anax\Models;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class CurlWrapModel implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;
    public $ipData = [];
    public $weatherData = [];
    public $map = [];

    public function getIpData($address, $key)
    {
        $curl = curl_init("http://api.ipstack.com/" . $address . '?access_key=' . $key . '');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($curl);
        curl_close($curl);

        // Decode JSON response:
        $this->ipData = json_decode($json, true);

        return $this->ipData;
    }

    public function getWeatherData($weatherKey)
    {
        $curl = curl_init('https://api.darksky.net/forecast/' . $weatherKey . '/' . $this->ipData["latitude"] . "," . $this->ipData["longitude"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($curl);
        curl_close($curl);

        // Decode JSON response:
        $this->weatherData = json_decode($json, true);

        return $this->weatherData;
    }
}
