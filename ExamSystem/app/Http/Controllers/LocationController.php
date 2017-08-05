<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IService\LocationServiceInterface;

class LocationController extends Controller
{

    /**
     * @LocationServiceInterface locationService
     *
     *
     */

    protected $locationService;

    /**
     * LocationController constructor.
     */
    public function __construct(LocationServiceInterface $locationService)
    {
        $this->middleware('auth');
        $this->locationService = $locationService;
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        $success = $this->locationService->insertLocation($request->all());
        if($success){
            return redirect()->back()->withErrors(['msg'=>'success']);
        }
        return redirect()->back()->withErrors(['msg'=>'error'])->withInput();
    }


    public function edit()
    {
        $locations = $this->locationService->getAllLocation();
        return view('location.edit',[
            'locations'=>$locations
        ]);
    }

    public function update($id,Request $request)
    {
        $this->locationService->updateLocationNameById($id,$request->all());
        return redirect()->back()->withErrors(['msg'=>'update_success']);
    }

    public function delete($id)
    {
        $this->locationService->deleteLocationById($id);
        return redirect()->back()->withErrors(['msg'=>'delete_success']);
    }
}
