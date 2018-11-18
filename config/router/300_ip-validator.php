<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Validering",
            "mount" => "ip",
            "handler" => "\Anax\IpValidation\IpValidatorController",
        ],
    ]
];
