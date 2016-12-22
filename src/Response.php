<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:03
 */
class Response
{

    public function __construct()
    {

    }

    public function setStatus($code)
    {
        switch ($code) {
            case 200:
                header('HTTP/1.1 200 OK');
                break;
            case 500:
                header('HTTP/1.1 500 Internal Server Error');
                break;
            case 404:
                header('HTTP/1.1 404 Not Found');
                break;
            default:
                break;
        }
    }


    public function setHeader($type)
    {
        switch ($type) {
            case 'json':
                header('Content-Type: application/json; charset=UTF-8');
                break;
            case 'text':
                header('Content-Type: text/html; charset=UTF-8');
                break;
        }
    }


    public function setBody($data = null)
    {
        if (is_array($data)) {
            exit(json_encode($data));
        } elseif (is_string($data)) {
            exit($data);
        } else {
            exit;
        }
    }

}