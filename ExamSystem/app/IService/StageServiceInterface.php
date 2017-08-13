<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/12
 * Time: 上午11:11
 */

namespace App\IService;


interface StageServiceInterface
{
    public  function insert($data);
    public function getAllStage();
    public function getStageById($id);
    public function updateStageById($request,$id);
    public function deleteById($id);
    public function getStageByPositionId($id);
}