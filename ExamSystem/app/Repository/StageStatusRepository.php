<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/13
 * Time: 下午5:58
 */

namespace App\Repository;


use App\IRepository\StageStatusRepositoryInterface;
use App\StageStatus;

class StageStatusRepository implements StageStatusRepositoryInterface
{

    protected $stageStatus;

    /**
     * StageStatusRepository constructor.
     * @param $stageStatus
     */
    public function __construct(StageStatus $stageStatus)
    {
        $this->stageStatus = $stageStatus;
    }


    public function insert($request)
    {
        $success = true;

        try{
            $this->stageStatus->insert($request);
        }catch (\Exception $exception){
            throw $exception;
            $success = false;
        }

        return $success;
    }

}