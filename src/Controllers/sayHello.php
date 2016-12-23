<?php
//use Validator;
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:22
 */
class sayHello extends abstractBaseController
{

    const HELLO_STR = 'Hello ';

    public function action($params)
    {
            $result = [
                'status'=> 'Success',
                'msg' => self::HELLO_STR. trim($params['name'])
            ];
            return $result;
    }
}