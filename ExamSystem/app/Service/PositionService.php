<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午11:13
 */

namespace App\Service;


use App\IRepository\PositionRepositoryInterface;
use App\IService\PositionServiceInterface;


class PositionService implements PositionServiceInterface
{

    private $positionRepo;

    /**
     * PositionService constructor.
     * @param $positionRepo
     */
    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepo = $positionRepository;
    }


    public function insertPosition($request)
    {
        if($this->positionRepo->getPositionCountByLocationAndName($request['location_id'],$request['name'])){
            return false;
        }
        $this->positionRepo->insertPosition($request);
        return true;
    }

    public function getAllPosition()
    {
        return $this->positionRepo->getAllPosition();
    }

    public function deleteById($id)
    {
        $this->positionRepo->deleteById($id);
    }


    public function update($id, $request)
    {
        $this->positionRepo->update($id,$request);
    }
}