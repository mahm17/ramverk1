<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "JSON väder data",
            "mount" => "json/weather/validated",
            "handler" => "\Anax\Weather\WeatherJsonController",
        ],
    ]
];
