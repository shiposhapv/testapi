<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:45
 */
class metadata extends abstractBaseComtroller
{

    public function action()
    {
        $nameFile = '../metadata/metadata.json';
        if (is_file($nameFile)) {
            $file = file_get_contents($nameFile);
        }
        if (!empty($file)) {
            $this->response->setStatus(200);
            $result = $file;
            return $result;
        } else {
            $this->response->setStatus(500);
        }
    }

}