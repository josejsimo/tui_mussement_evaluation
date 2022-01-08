<?php

/**
 * PHP version 7.4
 *
 * @category Library_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

namespace App\Libraries;

use App\Repositories\CityRepository;
use App\Repositories\WeatherRepository;

/**
 * CityWeatherProcessor
 *
 * @category Class
 * @package  Libraries
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

class CityWeatherProcessor
{

    /**
     * CityRepository
     *
     * @var $instance of class CityRepository.
     */
    private $cityRepository = null;

    /**
     * WeatherRepository
     *
     * @var $instance of class WeatherRepository.
     */
    private $weatherRepository = null;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cityRepository    = new CityRepository();
        $this->weatherRepository = new WeatherRepository();

    }//end __construct()


    /**
     * Get cities and foreach city get weather for the defined days
     *
     * @param $days number of days for weather forecast
     *
     * @return Weather for cities
     * @throws \Exception \Throwable
     */
    public function getWeatherForCities($days)
    {
        try {
            // City data abstracted from business logic. The get function can return data from an API or from a db of any type with total abstraction.
            $cities = $this->cityRepository->get();

            // Test it city data correct.
            if (is_array($cities) === false) {
                throw new \Exception("Invalid data format for cities");
            }

            $citiesWeather = [];

            foreach ($cities as $city) {
                $cityWeather = $this->getWeatherForCity($city, $days);
                array_push($citiesWeather, $cityWeather);
            }

            return $citiesWeather;
        } catch (\Throwable $ex) {
            throw $ex;
        }//end try

    }//end getWeatherForCities()


    /**
     * Get weather for a city for the defined days
     *
     * @param $city city info object
     * @param $days number of days for weather forecast
     *
     * @return Weather for the defined city
     * @throws \Exception \Throwable
     */
    private function getWeatherForCity($city, $days)
    {
        try {
            // Weather data abstracted from business logic. The get function can return data from an API or from a db of any type with total abstraction.
            $weather = $this->weatherRepository->getByCoordinates($city->latitude, $city->longitude, $days);

            // Test if weather data correct.
            if (is_array($weather->forecast->forecastday) === false) {
                throw new \Exception("Invalid forecast for city ".$city->name);
            }

            $cityWeather = [];

            foreach ($weather->forecast->forecastday as $forecast) {
                // Test if forecast condition data correct.
                if (empty($forecast->day->condition->text) === true) {
                    throw new \Exception("No weather condition for day ".$day." and city ".$city->name);
                }

                $dayWeather            = new \stdClass();
                $dayWeather->date      = $forecast->date;
                $dayWeather->condition = $forecast->day->condition->text;

                array_push($cityWeather, $dayWeather);
            }

            $cityWeatherObj          = new \stdClass();
            $cityWeatherObj->city    = $city->name;
            $cityWeatherObj->weather = $cityWeather;

            return $cityWeatherObj;
        } catch (\Throwable $ex) {
            throw $ex;
        }//end try

    }//end getWeatherForCity()


}//end class
