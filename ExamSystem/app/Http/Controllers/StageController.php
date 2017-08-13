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

        $locationRepo = RepositoryFactory::getLocationRepository();
        $locations = $locationRepo->getAllLocation();

        return view('stage.create', [
            'positions' => $positions,
            'locations' => $locations
        ]);
    }

    public function stageStore(Request $request)
    {
        $data = $request->input('data');
        $success = $this->stageService->insert($data);

        if ($success) {
            return redirect()->back()->withErrors(['msg' => 'success']);
        } else {
            return redirect()->back()->withErrors(['msg' => 'error']);
        }
        Log::info($request->input('data'));
    }

    public function stageEdit()
    {
        $stages = $this->stageService->getAllStage();
        $locationRepo = RepositoryFactory::getLocationRepository();
        $locations = $locationRepo->getAllLocation();
        return view('stage.edit', [
            'stages' => $stages,
            'locations' => $locations
        ]);
    }

    public function stageUpdate(Request $request, $id)
    {
        $success = $this->stageService->updateStageById($request->all(), $id);
        if ($success) {
            return redirect()->back()->withErrors(['msg' => 'update_success']);
        } else {
            return redirect()->back()->withErrors(['msg' => 'error']);
        }
    }

    public function stageDelete($id)
    {
        $success = $this->stageService->deleteById($id);
        if ($success) {
            return redirect()->back()->withErrors(['msg' => 'delete_success']);
        } else {
            return redirect()->back()->withErrors(['msg' => 'error']);
        }
    }
}
