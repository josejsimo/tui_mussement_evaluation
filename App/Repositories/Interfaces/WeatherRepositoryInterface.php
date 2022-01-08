<?php

/**
 * PHP version 7.4
 *
 * @category Repository_Interface
 * @package  TuiMussement_Evaluation
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * WeatherRepositoryInterface
 *
 * @category Interface
 * @package  Repositories
 * @author   Author <jjsimoperales@gmail.com>
 * @license  http://gnu.org/licenses/gpl-3.0.html GNU general public license v3.0
 */

interface WeatherRepositoryInterface extends RepositoryInterface
{


    /**
     * Get
     *
     * @param $cityLat  latitude of city
     * @param $cityLong longitude of city
     * @param $days     number of days for forecast
     *
     * @return null
     */
    public function getByCoordinates($cityLat, $cityLong, $days);


}//end interface
