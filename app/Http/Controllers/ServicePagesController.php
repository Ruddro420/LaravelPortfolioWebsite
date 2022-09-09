<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicePagesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.create');
    }

    public function list()
    {
        $services = Service::all(); // Data show from databse
        return view('pages.services.list' ,compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // DATA VALIDATION
         $this->validate($request,[
            'icon' => 'required|string',
            'tittle' => 'required|string',
            'description' => 'required|string'
        ]);

        $services = new Service;

        //DATA GET AND UPDATE
        $services->icon = $request->icon;
        $services->tittle = $request->tittle;
        $services->description = $request->description;

        $services->save();
        return redirect()->route('create')->with('success',"New Services Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('pages.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          // DATA VALIDATION
          $this->validate($request,[
            'icon' => 'required|string',
            'tittle' => 'required|string',
            'description' => 'required|string'
        ]);

        $services = Service::find($id);

        //DATA GET AND UPDATE
        $services->icon = $request->icon;
        $services->tittle = $request->tittle;
        $services->description = $request->description;

        $services->save();
        return redirect()->route('list')->with('success',"Services Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();
        return redirect()->route('list')->with('success',"Services Deleted Successfully");
    }
}
