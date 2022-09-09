<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoPageController extends Controller
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
     // For LOGO PAGE
     public function logo()
     {
         //DATA GET 
         
         $logo = logo::first();
 
         //RETURN DATA TO THE Logo PAGE USING "compact" function
         return view('pages.logo',compact('logo')); 
         
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
            'logo_img' => 'required|file',
         ],
         [
            'logo_img.required' => 'You Have To Upload The Logo File First'
        ]
    
    );

        $logo = logo::first();
        //IMAGE UPDATE
        if($request->file('logo_img'))
        {
            $logo_file = $request->file('logo_img');
            $logo_file->storeAs('public/logo/','logo_img.'. $logo_file->getClientOriginalExtension());
            $logo->logo_img = 'storage/logo/logo_img.' . $logo_file->getClientOriginalExtension();
        }

        $logo->save();  //Save The Data

        // Return And Redirect and Show The Message
        return redirect()->route('logo')->with('success', "Main Page Data has been Update Successfully"); 
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
