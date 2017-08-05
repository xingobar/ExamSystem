<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 上午10:26
 */

namespace App\Service;

use App\IRepository\LocationRepositoryInterface;
use App\IService\LocationServiceInterface;

class LocationService implements LocationServiceInterface
{

    /**
     * @LocationRepositoryInterface locationRepo
     *
     */

    protected $locationRepo;

    /**
     * LocationService constructor.
     */
    public function __construct(LocationRepositoryInterface $locationRepo)
    {
        $this->locationRepo = $locationRepo;
    }

    public function isExists($name)
    {
        return $this->locationRepo->getLocationCountByName($name);
    }

    public function insertLocation($request)
    {
        if($this->isExists($request['name'])){
            return false;
        }
        $this->locationRepo->insertLocation($request);
        return true;
    }

    public function getAllLocation()
    {
        return $this->locationRepo->getAllLocation();
    }

    public function deleteLocationById($id)
    {
        $this->locationRepo->deleteLocationById($id);
    }

    public function updateLocationNameById($id, $request)
    {
        $this->locationRepo->updateNameById($id,$request);
    }
}