<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;


class MainPagesController extends Controller
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

    public function dash()
    {
        return view('pages.dashboard');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // FOR MAIN PAGE
    public function index()
    {
        //DATA GET 
        
        $main = Main::first();

        //RETURN DATA TO THE MAIN PAGE
        return view('pages.main' ,compact('main')); 
        
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // DATA VALIDATION
        $this->validate($request,[
            'tittle' => 'required|string',
            'sub_tittle' => 'required|string',
        ]);

        $main = Main::first();

        //DATA GET AND UPDATE
        $main->tittle = $request->tittle;
        $main->sub_tittle = $request->sub_tittle;

        //IMAGE UPDATE
        if($request->file('bc_img'))
        {
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/','bc_img.'. $img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.' . $img_file->getClientOriginalExtension();
        }

        //PDF UPDATE
        if($request->file('resume'))
        {
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume.'. $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.' . $pdf_file->getClientOriginalExtension();
        }
        
        $main->save();  //Save The Data

        // Return And Redirect and Show The Message
        return redirect()->route('main')->with('success', "Main Page Data has been Update Successfully"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
