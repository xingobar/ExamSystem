<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use RepositoryFactory;
use App\IService\PositionServiceInterface;

class PositionController extends Controller
{
    /**
     * @var PositionServiceInterface $positionService
     *
     */
    private $positionService;

    /**
     * PositionController constructor.
     */
    public function __construct(PositionServiceInterface $positionService)
    {
        $this->middleware('auth');
        $this->positionService = $positionService;
    }

    public function create()
    {
        $locationRepo = RepositoryFactory::getLocationRepository();
        $locations = $locationRepo->getAllLocation();

        return view('position.create',[
            'locations'=>$locations
        ]);
    }

    public function store(Request $request)
    {
        $success = $this->positionService->insertPosition($request->all());
        if($success){
            return redirect()->back()->withErrors(['msg'=>'success']);
        }
        return redirect()->back()->withErrors(['msg'=>'error']);
    }

    public function edit()
    {
        $positions = $this->positionService->getAllPosition();
        $locationRepo = RepositoryFactory::getLocationRepository();
        $locations = $locationRepo->getAllLocation();
        return view('position.edit',[
            'positions'=>$positions,
            'locations'=>$locations
        ]);
    }

    public function update($id,Request $request)
    {
        $this->positionService->update($id,$request->all());
        return redirect()->back()->withErrors(['msg'=>'update_success']);
    }

    public function delete($id)
    {
        $this->positionService->deleteById($id);
        return redirect()->back()->withErrors(['msg'=>'delete_success']);
    }
}
