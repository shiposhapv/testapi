<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 22.12.2016
 * Time: 13:45
 */
class sayHelloInLanguage extends abstractBaseController
{
    const HELLO_STR = 'Hello';
    const GOOGLE_API_KEY = 'AIzaSyCDogEcpeA84USVXMS471PDt3zsG-caYDM';
    const GOOGLE_URI_TRANSLATE = 'https://www.googleapis.com/language/translate/v2?';

    public function action($params)
    {
        $curl = new Curl();
        $data = [
            'url' => self::GOOGLE_URI_TRANSLATE,
            'data' => [
                'q' => rawurlencode(self::HELLO_STR),
                'key' => self::GOOGLE_API_KEY,
                'target' => $params['language']
            ],
        ];
        $curl->setParameters($data);
        $curl->sendRequest();
        $respons = $curl->getRespons();
        if (!empty($data) && isset($respons["data"]['translations'][0])) {
            $result = [
                'status' => 'Success',
                'msg' => $respons["data"]['translations'][0]['translatedText'] . ' ' . trim($params['name'])
            ];
        } else {
            $result = [
                'status' => '“Error”',
                'msg' => $respons['error']
            ];
        }
        return $result;
    }


}