<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午11:12
 */

namespace App\IService;


interface PositionServiceInterface
{
    public function insertPosition($request);
    public function getAllPosition();
    public function deleteById($id);
    public function update($id,$request);
    public function getPositionByLocation($locationId);
}