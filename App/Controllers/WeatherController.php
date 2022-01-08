<?php

/**
 * PHP version 7.4
 *
 * @category Controller_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

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
    private $cityWeather = null;


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
    public function getWeather($days=1)
    {
        try {
            if (is_int($days) === false) {
                throw new \Exception("Invalid format for days");
            }

            return $this->cityWeather->getWeatherForCities($days);
        } catch (\Throwable $ex) {
            echo("Error message ".$ex->getMessage());
        }//end try

    }//end getWeather()


}//end class
