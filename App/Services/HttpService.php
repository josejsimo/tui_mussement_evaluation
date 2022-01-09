<?php

/**
 * PHP version 7.4
 *
 * @category Services_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

declare(strict_types=1);

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
    public static function HttpRequest(string $url, string $method="GET")
    {
        try {
            if (($method === "GET") === false
                && ($method === "POST") === false
                && ($method === "PUT") === false
                && ($method === "PATCH") === false
                && ($method === "DELETE") === false
            ) {
                throw new \Exception("Invalid HTTP method");
            }

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

            // Test if curl errno is valid.
            if ((curl_errno($ch) === 0) === false) {
                throw new \Exception("Http error ".curl_errno($ch)." in http request");
            }

            return $output;
        } catch (\Throwable $ex) {
            throw $ex;
        }//end try

    }//end HttpRequest()


}//end class
