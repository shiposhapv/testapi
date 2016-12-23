<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:00
 */
class Request
{

    public $path;
    public $method;
    public $url;


    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->url = parse_url($_SERVER['REQUEST_URI']);
        $this->path = $this->url['path'];
        $this->params = $_REQUEST;
    }

    public function getPath()
    {
        return $this->path;
    }
     public function getMetod()
    {
        return $this->method;
    }

     public function getParams()
    {
        return $this->params;
    }

}