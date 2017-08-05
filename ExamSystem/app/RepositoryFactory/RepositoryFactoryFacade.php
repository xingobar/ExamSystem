<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午10:16
 */

namespace App\RepositoryFactory;


use App\Repository\LocationRepository;
use App\Location;

class RepositoryFactoryFacade
{
    protected $_locationRepo = null;

    public function getLocationRepository()
    {
       if(!isset($_locationRepo)){
           $_locationRepo = new LocationRepository(new Location());
       }
       return $_locationRepo;
    }
}