<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP-validering med position",
            "mount" => "position",
            "handler" => "\Anax\IpValidation\GeographyController",
        ],
    ]
];
