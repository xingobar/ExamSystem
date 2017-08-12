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


    public function insert($name,$position_id,$stageId)
    {
        try{
            $stage = Stages::create([
                'name'=>$name,
                'stage'=>$stageId,
                'position_id'=>$position_id
            ]);

            if(!$stage){
                DB::rollback();
                throw new \Exception('Stage created fail');
            }
        }catch(QueryException $queryException) {
            DB::rollback();
            throw new \Exception('Stage data does not provide');
        }catch (\Exception $exception){
            DB::rollback();
            throw new \Exception('Stage created fail');
        }

    }
}