<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/12
 * Time: 上午11:11
 */

namespace App\Service;


use App\IRepository\StageRepositoryInterface;
use App\IService\StageServiceInterface;
use DB;
use Log;
use Mockery\Exception;

class StageService implements StageServiceInterface
{
    protected $stageRepo;

    /**
     * StageService constructor.
     * @param $stageRepo
     */
    public function __construct(StageRepositoryInterface $stageRepo)
    {
        $this->stageRepo = $stageRepo;
    }


    public function insert($data)
    {
        $success = true;

        //start transaction
        DB::beginTransaction();

        try{

            global $success;

            $success = $this->stageRepo->insert($data);

        }catch(Exception $exception)
        {
            DB::rollback();
            $success = false;
            throw new Exception('insert data error');
        }

        if($success)
        {
            // commit the query
            DB::commit();
        }
        return $success;

    }


}