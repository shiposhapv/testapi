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
    public $metod = 'GET';
    public $header;

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
        if (!empty($params['header'])) {
            $this->header = $params['header'];
        }
    }

    public function sendRequest()
    {
        if (!empty($this->url)) {
            if ($this->metod = 'GET') {
                if (!empty($this->data)) {
                    $this->url = $this->url . http_build_query($this->data);
                }
                $handle = curl_init($this->url);
            } else {
                $handle = curl_init();
                curl_setopt($handle, CURLOPT_URL, $this->url);
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, $this->data);
            }
            if (!empty($this->header)) {
                curl_setopt($handle, CURLOPT_HTTPHEADER, $this->header);
            }
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);
            $this->respons = json_decode($response, true);
            curl_close($handle);
        }
    }

    public function getRespons()
    {
        return $this->respons;
    }


}