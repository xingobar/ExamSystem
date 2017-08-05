<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use RepositoryFactory;
use App\IService\PositionServiceInterface;

class PositionController extends Controller
{

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
        $this->positionService->insertPosition($request->all());
        return redirect()->back()->withErrors(['msg'=>'success']);
    }
}
