<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:23
 */

$request = new Request();
$metod = $request->getMetod();
$params = $request->getParams();
$path = $request->getPath();

$response = new Response();

if (isset($arrayRouts[$metod][$path])) {
    $controller = $arrayRouts[$metod][$path];

    include_once __DIR__ . '/Controllers/' . $controller . '.php';

    $validation = new Validator();
    $arrayFilters = $confVAlidator[$controller] ?? [];
    $validation->setParameters($params, $arrayFilters);

    if ($validation->getResult()) {
        $object = new $controller($response);
        $result = $object->action($params);
        if(isset($result['status']) && $result['status'] == 'Success'){
            $response->setStatus(200);
        }else{
            $response->setStatus(500);
        }
    } else {
        $result = [
            'status' => 'Error',
            'msg' => $validation->getError()
        ];
        $response->setStatus(500);
    }
    $response->setHeader('json');
    $response->setBody($result);
} else {
    $response->setStatus(404);
    $response->setBody('404 Not Found');
}

