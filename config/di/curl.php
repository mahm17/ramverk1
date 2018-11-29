<?php

return [
    "services" => [
        "curl" => [
            "shared" => true,
            "callback" => function () {
                $curlWrap = new \Anax\Models\CurlWrapModel();
                return $curlWrap;
            }
        ],
    ],
];
