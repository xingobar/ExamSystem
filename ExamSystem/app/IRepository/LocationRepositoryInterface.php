<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 上午10:21
 */

namespace App\IRepository;


interface LocationRepositoryInterface
{
    public function insertLocation($request);
    public function getLocationCountByName($name);
    public function getAllLocation();
    public function deleteLocationById($id);
    public function updateNameById($id,$request);
}