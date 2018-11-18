<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "JSON Validering",
            "mount" => "ip/json/validated",
            "handler" => "\Anax\IpValidation\JsonController",
        ],
    ]
];
