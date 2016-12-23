<?php

$nameFile = '../src/conf/valid.json';
if (is_file($nameFile)) {
    $confVAlidator = json_decode(@file_get_contents($nameFile),true);
}


include_once __DIR__ . '/../src/Router.php';
include_once  __DIR__ . '/../src/Response.php';
include_once  __DIR__ . '/../src/Request.php';
include_once  __DIR__ . '/../src/Validator.php';
include_once  __DIR__ . '/../src/Curl.php';
include_once  __DIR__ . '/../src/Controllers/abstractBaseComtroller.php';

require __DIR__ . '/../src/Bootstrap.php';