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
        global $success ;
        $success = true;

        //start transaction
        DB::beginTransaction();

        try {

            global $success;
            $data = $this->checkStageId($data, $data[0]['position_id']);
            $success = $this->stageRepo->insert($data);

            if($success)
            {
                // commit the query
                DB::commit();
            }

        } catch (\Exception $exception) {
            DB::rollback();
            $success = false;
            //throw new \Exception('insert data error');
            throw new \Exception($exception->getMessage());
        }catch(\Throwable $throwable)
        {
            throw $throwable;
        }

        return $success;

    }

    /**
     *  check stage id whether exists in database
     *  then it will get the data from database if stage id exists
     *
     * @param array $data
     * @param int $positionId
     * @return array $data
     *
     *
     */
    private function checkStageId($data, $positionId)
    {

        $stageId = $this->stageRepo->getStageIdByPosition($positionId);
        $dataArray = array();

        if ($stageId !== null) {

            foreach ($data as $stage ){

                $stageId += 1;
                $stage['stage'] = $stageId;
                array_push($dataArray,$stage);
            }
            $data = $dataArray;
        }

        return $data;
    }

    /**
     * return about stage data;
     * @return mixed
     */

    public function getAllStage()
    {
        return $this->stageRepo->getAllStage();
    }

    public function getStageById($id)
    {
        return $this->stageRepo->getStageById($id);
    }

    public function updateStageById($request, $id)
    {
        $success = true;

        try{
            $stage = $this->stageRepo->getStageById($id);
            $stage->name = $request['name'];
            $stage->save();
        }catch(\Exception $exception){
            throw new Exception('update error');
            $success = false;
        }

        return $success;
    }

    public function deleteById($id)
    {

        $success = true;

        try{
            $this->stageRepo->deleteById($id);

        }catch(\Exception $exception){
            throw new Exception($exception->getMessage());
            $success = false;
        }

        return $success;
    }

    public function getStageByPositionId($id)
    {
        return $this->stageRepo->getStageByPositionId($id);
    }


}