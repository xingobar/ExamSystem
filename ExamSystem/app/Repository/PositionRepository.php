<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午11:11
 */

namespace App\Repository;


use App\IRepository\PositionRepositoryInterface;
use App\Position;

class PositionRepository implements PositionRepositoryInterface
{

    private $position;

    /**
     * PositionRepository constructor.
     * @param $position
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }


    public function insertPosition($request)
    {
        $position = new Position($request);
        $position->save();
    }

    public function getPositionCountByLocationAndName($locationId, $name)
    {
        return $this->position->where('location_id',$locationId)
                        ->where('name',$name)
                        ->count();
    }

    public function getAllPosition()
    {
        return $this->position->orderBy('created_at','asc')->get();
    }

    public function deleteById($id)
    {
        $this->position->destroy($id);
    }

    public function update($id,$request)
    {
        $position = $this->position->findOrFail($id);
        $position->fill($request);
        $position->save();
    }

    public function getPositionByLocation($locationId)
    {
        return $this->position->where('location_id',$locationId)->get();
    }


}