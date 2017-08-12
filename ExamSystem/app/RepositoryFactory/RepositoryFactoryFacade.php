<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午10:16
 */

namespace App\RepositoryFactory;


use App\Position;
use App\Repository\LocationRepository;
use App\Location;
use App\Repository\PositionRepository;

class RepositoryFactoryFacade
{
    protected $_locationRepo = null;
    private $_positionRepo = null;

    public function getLocationRepository()
    {
       if(!isset($_locationRepo))
       {
           $_locationRepo = new LocationRepository(new Location());
       }
       return $_locationRepo;
    }

    public function getPositionRepository()
    {
        if(!isset($_positionRepo))
        {
            $_positionRepo = new PositionRepository(new Position());
        }
        return $_positionRepo;
    }
}