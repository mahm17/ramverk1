<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "JSON Validering med position",
            "mount" => "json/position/validated",
            "handler" => "\Anax\IpValidation\JsonPositionController",
        ],
    ]
];
