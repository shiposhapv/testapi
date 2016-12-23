<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 23.12.2016
 * Time: 0:20
 */

$arrayRouts = [
    'POST' => [
        '/api/sayHello' => 'sayHello',
        '/api/sayHelloInLanguage' => 'sayHelloInLanguage'
    ],
    'GET' => [
        '/api/' => 'metadata',
    ]
];