<?php
/**
 * Created by PhpStorm.
 * User: xingobar
 * Date: 2017/8/5
 * Time: 下午10:22
 */

namespace App\RepositoryFactory\Facade;


use Illuminate\Support\Facades\Facade;

class RepositoryFactoryFacade extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return 'factory'; /// service provider bind name
    }


}