<?php

namespace App\Http\Controllers;

use App\IService\StageServiceInterface;
use Illuminate\Http\Request;
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
        $name = $request->input('name');
        $positionId = $request->input('position_id');
        $this->stageService->insert($name,$positionId);
    }
}
