<?php

namespace App\Http\Controllers;

use App\IService\StageServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CreateStageRequest;
use RepositoryFactory;
use Log;

class StageController extends Controller
{

    protected $stageService;

    /**
     * StageController constructor.
     *
     * @param StageServiceInterface $stageServiceInterface
     */

    public function __construct(StageServiceInterface $stageService)
    {
        $this->middleware('auth');
        $this->stageService = $stageService;
    }

    public function stageCreate()
    {
        $positionRepo = RepositoryFactory::getPositionRepository();
        $positions = $positionRepo->getAllPosition();

        return view('stage.create',[
            'positions'=>$positions
        ]);
    }

    public function stageStore(Request $request)
    {
         $data =$request->input('data');
         $success = $this->stageService->insert($data);

         if($success)
         {
             return redirect()->back()->withErrors(['msg'=>'success']);
         }else{
             return redirect()->back()->withErrors(['msg'=>'error']);
         }
         Log::info($request->input('data'));
    }
}
