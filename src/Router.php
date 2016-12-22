<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:23
 */
$confVAlidator = [
    'sayHello' =>
        [
            'name' => [
                'checkLength' => [
                    'min' => 2,
                    'max' => 15
                ],
                'checkRegex' => [
                    'regex' => ''
                ]
            ]
        ],
    'sayHelloInLanguage' =>
        [
            'name' => [
                'checkLength' => [
                    'min' => 2,
                    'max' => 15
                ],
                'checkRegex' => [
                    'regex' => ''
                ]
            ]
        ]
];

include_once 'Response.php';
include_once 'Validator.php';
include_once 'Curl.php';

$metod = $_SERVER['REQUEST_METHOD'];
$params = $_REQUEST;
$url = parse_url($_SERVER['REQUEST_URI']);

$arrayRouts = [
    'POST' => [
        '/api/sayHello' => 'sayHello',
        '/api/sayHelloInLanguage' => 'sayHelloInLanguage'
    ],
    'GET' => [
        '/api/' => 'metadata',
    ]
];

$path = $url['path'];
if (isset($arrayRouts[$metod][$path])) {

    $controller = $arrayRouts[$metod][$path];
    include_once 'Controllers/abstractBaseComtroller.php';
    include_once 'Controllers/' . $controller . '.php';

    $response = new Response();

    $object = new $controller($response);
    $validation = new Validator();
    $arrayFilters = $confVAlidator[$controller];
    $validation->setParameters($params, $arrayFilters);
    if ($validation->getResult()) {
        $result = $object->action($params);
        $response->setHeader('json');
        $response->setBody($result);
    } else {
        $result = [
            'status' => '“Error”',
            'msg' => $validation->getError()
        ];
        $response->setStatus(500);
        $response->setBody($result);
    }
} else {
    $response = new Response();
    $response->setStatus(404);
    $response->setBody('404 Not Found');

}

