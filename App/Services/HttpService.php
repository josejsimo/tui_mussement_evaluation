<?php

/**
 * PHP version 7.4
 *
 * @category Services_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

namespace App\Services;

/**
 * HttpService
 *
 * @category Class
 * @package  Services
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

class HttpService
{


    /**
     * Http request
     *
     * @param $url    url for request
     * @param $method http method for request
     *
     * @return Weather object
     * @throws Throwable
     */
    public static function HttpRequest($url, $method="GET")
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // Commented line curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);.
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_POST, 1);

            $output = curl_exec($ch);

            if (curl_errno($ch) === 0) {
                return $output;
            }
        } catch (\Throwable $ex) {
            throw $ex;
        }//end try

    }//end HttpRequest()


}//end class
