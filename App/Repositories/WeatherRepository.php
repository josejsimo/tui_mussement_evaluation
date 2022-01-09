<?php

/**
 * PHP version 7.4
 *
 * @category Repository_Class
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Interfaces\WeatherRepositoryInterface;

use Config\AppConfig;
use App\Services\HttpService;
use App\Repositories\Common\Repository;

/**
 * WeatherRepository
 *
 * @category Class
 * @package  Repositories
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

class WeatherRepository extends Repository implements WeatherRepositoryInterface
{


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apiUrl = AppConfig::$weatherApi;

    }//end __construct()


    /**
     * Get weather
     *
     * @return Cities object
     * @throws Throwable
     */
    public function get()
    {
        return null;

    }//end get()


    /**
     * Get weather by coordinates
     *
     * @param $cityLat  latitude of city
     * @param $cityLong longitude of city
     * @param $days     days of forecast
     *
     * @return Weather object
     * @throws Throwable
     */
    public function getByCoordinates(float $cityLat, float $cityLong, int $days)
    {
        try {
            return json_decode(HttpService::HttpRequest($this->apiUrl.'&q='.$cityLat.','.$cityLong.'&days='.$days));
        } catch (\Throwable $ex) {
            throw $ex;
        }

    }//end getByCoordinates()


}//end class
