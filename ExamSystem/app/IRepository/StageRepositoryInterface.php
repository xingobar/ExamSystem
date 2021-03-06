<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/12
 * Time: 上午11:08
 */

namespace App\IRepository;


interface StageRepositoryInterface
{
    public function insert($dataArray);
    public function getStageIdByPosition($positionId);
    public function getAllStage();
    public function getStageById($id);
    public function deleteById($id);
    public function getStageByPositionId($positionId);
}