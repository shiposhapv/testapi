<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:45
 */
class sayHelloInLanguage extends abstractBaseComtroller
{
    const HELLO_STR = 'Hello ';
    public function action($params)
    {
$text = self::HELLO_STR. $params['name'];
        $curl = new Curl();
        $params = [
            'url' => 'https://translate.google.com.ua/',
            'text' => $text
        ];
        $curl->setParameters($params);
        $data = $curl->getRespons();
        if(!empty($data)){
            $result = [
                'status'=> 'Success',
                'msg' => $data
            ];
            $this->response->setStatus(200);
        }else{

            $result = [
                'status' => '“Error”',
                'msg' => $data['error']
            ];
            $this->response->setStatus(500);
            $this->response->setBody($result);
        }

        return $result;
    }


}