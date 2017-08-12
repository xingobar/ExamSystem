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
use Illuminate\Database\QueryException;
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


    public function insert($nameArray,$positionId)
    {
        $count = 1;

        //start transaction
        DB::beginTransaction();

        foreach ($nameArray as $name)
        {
            try{
                $this->stageRepo->insert($name,$positionId, $count);
                $count += 1;
            }catch (QueryException $queryException){
                Log::info($queryException->getMessage());
                break;
            }
            catch(Exception $exception){
                Log::info($exception->getMessage());
                break;
            }

        }

        // commit the query
        DB::commit();
        return redirect()->to('/add_stage')->withErrors(['msg'=>'success']);
    }

}