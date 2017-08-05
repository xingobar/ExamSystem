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
}