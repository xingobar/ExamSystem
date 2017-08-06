<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StageController extends Controller
{



    public function stageCreate()
    {
        return view('stage.create');
    }

    public function stageStore()
    {

    }
}
