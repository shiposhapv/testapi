<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:45
 */
class sayHelloInLanguage extends abstractBaseComtroller
{

    public function action($params)
    {
        $result = [
            'status'=> 'Success',
            'msg' => self::HELLO_STR. $params['name']
        ];
        $this->response->setStatus(200);
        return $result;
    }


}