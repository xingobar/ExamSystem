<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/12
 * Time: 上午11:08
 */

namespace App\Repository;


use App\IRepository\StageRepositoryInterface;
use App\Stages;
use DB;
use Illuminate\Database\QueryException;
use Log;

class StageRepository implements StageRepositoryInterface
{
    protected  $stage ;

    /**
     * StageRepository constructor.
     * @param $stage
     */
    public function __construct(Stages $stage)
    {
        $this->stage = $stage;
    }


    public function insert($dataArray)
    {
        try{

            Stages::insert($dataArray);

        }catch(QueryException $queryException) {
            throw new \Exception('Stage data does not provide');
            Log::error('Stage data does not provide');
            return false;
        }catch (\Exception $exception){
            throw new \Exception('Stage created fail');
            Log::error('Stage created fail');
            return false;
        }
        return true;

    }

    public function getStageIdByPosition($positionId)
    {
        $stage = Stages::where('position_id',$positionId)->take(1)->get();
        return $stage->stage;
    }

}