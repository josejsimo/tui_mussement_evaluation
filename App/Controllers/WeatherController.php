<?php

/**
 * PHP version 7.4
 *
 * @category Controller_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Libraries\CityWeatherProcessor;


/**
 * WeatherController
 *
 * @category Class
 * @package  Controllers
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

class WeatherController
{

    /**
     * CityWeather
     *
     * @var $instance of class CityWeatherProcessor.
     */
    private CityWeatherProcessor $cityWeather;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cityWeather = new CityWeatherProcessor();

    }//end __construct()


    /**
     * Gets weather info for cities
     *
     * @param $days number of days for weather forecast
     *
     * @return Weather for cities
     * @throws \Exception
     */
    public function getWeather(int $days=1)
    {
        try {
            return $this->getResponse(0, $this->cityWeather->getWeatherForCities($days));
        } catch (\Throwable $ex) {
            return $this->getResponse(1, $ex->getMessage());
        }//end try

    }//end getWeather()


    /**
     * Get response
     *
     * @param $error error number for resposne
     * @param $data  data or error message for response
     *
     * @return Weather for cities
     * @throws \Exception
     */
    private function getResponse($error, $data)
    {
        $response        = new \stdClass();
        $response->error = $error;
        $response->data  = $data;

        return $response;

    }//end getResponse()


}//end class
