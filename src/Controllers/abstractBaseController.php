<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 15:02
 */
class abstractBaseController
{
    public $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

}