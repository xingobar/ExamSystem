<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 上午10:32
 */

namespace App\IService;


interface LocationServiceInterface
{
    public function isExists($name);
    public function insertLocation($name);
    public function getAllLocation();
    public function deleteLocationById($id);
    public function updateLocationNameById($id,$request);
}