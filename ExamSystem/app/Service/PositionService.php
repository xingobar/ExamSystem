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
        $this->positionRepo->insertPosition($request);
    }
}