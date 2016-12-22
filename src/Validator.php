<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:08
 */
class Validator
{
    public $params;
    public $filters;
    public $error = [];

    public function __construct()
    {

    }

    public function setParameters($arrayParams = null, $arrayFilters = null)
    {
        $this->params = $arrayParams;
        $this->filters = $arrayFilters;
    }

    public function getResult()
    {

        foreach ($this->filters as $nameParams => $arrayFilters) {
            foreach ($arrayFilters as $kay => $setings) {
                $this->$kay($this->params[$nameParams], $setings);
            }

        }


        if (!empty($this->error)) {
            return false;
        }
        return true;
    }

    public function getError()
    {
        return $this->error;
    }

    public function checkLength($string, $params)
    {
        $string = trim($string);
        $length = strlen($string);
        if (isset($params['min']) && $length < $params['min']) {
            $this->error[] = 'Name is too short';
        }
        if (isset($params['max']) && $length > $params['max']) {
            $this->error[] = 'Name is too long';
        }

    }


    public function checkRegex($string, $regex)
    {



    }

}