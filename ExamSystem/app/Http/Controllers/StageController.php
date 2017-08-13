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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param Request $request
     * @return $this
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function stageUpdate(Request $request, $id)
    {
        $success = $this->stageService->updateStageById($request->all(), $id);
        if ($success) {
            return redirect()->back()->withErrors(['msg' => 'update_success']);
        } else {
            return redirect()->back()->withErrors(['msg' => 'error']);
        }
    }

    /**
     * @param $id
     * @return $this
     */
    public function stageDelete($id)
    {
        $success = $this->stageService->deleteById($id);
        if ($success) {
            return redirect()->back()->withErrors(['msg' => 'delete_success']);
        } else {
            return redirect()->back()->withErrors(['msg' => 'error']);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stageStatusCreate()
    {
        $positionRepo = RepositoryFactory::getPositionRepository();
        $locationRepo = RepositoryFactory::getLocationRepository();

        $locations = $locationRepo->getAllLocation();
        $positions = $positionRepo->getPositionByLocation($locations[0]['id']);
        $stages = $this->stageService->getStageByPositionId($positions[0]['id']);

        return view('stage_status.create',[
            'stages'=>$stages,
            'positions'=>$positions,
            'locations'=>$locations
        ]);
    }

    public function stageStatusStore(Request $request)
    {
        $stageStatusRepo = RepositoryFactory::getStageStatusRepository();
        $success = $stageStatusRepo->insert($request->except(['location','position_id','_token']));
        if ($success) {
            return redirect()->back()->withErrors(['msg' => 'success']);
        } else {
            return redirect()->back()->withErrors(['msg' => 'error']);
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getStageByPositionId($id)
    {
        return $this->stageService->getStageByPositionId($id);
    }
}
