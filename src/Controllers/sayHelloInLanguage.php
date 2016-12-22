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
    const googleApiKey = 'Hello ';

    public function action($params)
    {
        $text = self::HELLO_STR . $params['name'];
        $curl = new Curl();
        $data = [
            'url' => 'https://www.googleapis.com/language/translate/v2?key=AIzaSyCDogEcpeA84USVXMS471PDt3zsG-caYDM&q=' . rawurlencode($text) . '&source=ru&target=' . $params['language'],
            'data' => [
                'q' => $text,
                'key' => self::googleApiKey,
                'target' => $params['language']
            ],
        ];
        $curl->setParameters($data);
        $curl->sendRequest();
        $data = $curl->getRespons();
        if (!empty($data) && isset($data["data"]['translations'][0])) {
            $result = [
                'status' => 'Success',
                'msg' => $data["data"]['translations'][0]['translatedText']
            ];
            $this->response->setStatus(200);
        } else {

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