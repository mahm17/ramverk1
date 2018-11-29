<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Få ut väder data",
            "mount" => "weather",
            "handler" => "\Anax\Weather\WeatherController",
        ],
    ]
];
