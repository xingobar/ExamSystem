<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午11:10
 */

namespace App\IRepository;


interface PositionRepositoryInterface
{
    public function insertPosition($request);
    public function getPositionCountByLocationAndName($locationId,$name);
    public function getAllPosition();
    public function deleteById($id);
    public function update($id,$request);
    public function getPositionByLocation($locationId);
}