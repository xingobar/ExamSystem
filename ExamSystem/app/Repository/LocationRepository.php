<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 上午10:18
 */


namespace  App\Repository;

use App\Location;
use App\IRepository;

class LocationRepository implements IRepository\LocationRepositoryInterface
{

    /*

    @model Location
    */
    protected  $location;

    /**
     * LocationRepository constructor.
     * @param $location
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
    }


    public function deleteLocationById($id)
    {
        $this->location->destroy($id);
    }

    public function updateNameById($id,$request)
    {
        $location = $this->location->findOrFail($id);
        $location->fill($request);
        $location->save();
    }

    public function insertLocation($request)
    {
        $location = new Location($request);
        $location->save();
    }

    public function getLocationCountByName($name)
    {
        return $this->location->where('name',$name)->count();
    }

    public function getAllLocation()
    {
        // TODO: Implement showAllLocation() method.
        return $this->location->orderby('created_at','desc')->get();
    }
}