<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:08
 */
class Curl
{

    public $respons;
    public $url;
    public $data;
    public $metod = 'POST';

    public function setParameters($params)
    {
        if (isset($params['url'])) {
            $this->url = $params['url'];
        }

        if (isset($params['data'])) {
            $this->data = $params['data'];
        }

        if (isset($params['metod'])) {
            $this->metod = $params['metod'];
        }

    }

    public function sendRequest()
    {
        if ($curl = curl_init() && !empty($this->url)) {
            curl_setopt($curl, CURLOPT_URL, $this->url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            if (isset($this->data)) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
            }
            $this->respons = curl_exec($curl);
            curl_close($curl);
        }

    }

    public function getRespons()
    {
        return $this->respons;
    }


}