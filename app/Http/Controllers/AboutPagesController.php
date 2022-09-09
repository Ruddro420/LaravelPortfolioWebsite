<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AboutPagesController extends Controller
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
    public function create()
    {
        return view('pages.about.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $about = About::all();
        return view('pages.about.list',compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'month'=> 'required|string',
            'tittle' => 'required|string',
            'description' => 'required|string',
            'big_img' => 'required|image'
        ]);

        $about = new About;
        $about->month = $request->month;
        $about->tittle = $request->tittle;
        $about->description = $request->description;

        //For Big Image Store in databse

         $big_file = $request->file('big_img');
         storage::putFile('public/about/',$big_file);
         $about->big_img = "storage/about/".$big_file->hashName();

         $about->save();
         return redirect()->route('admin.about.create')->with('success',"New About Created Successfully");
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
        $about = About::find($id);
        return view('pages.about.edit',compact('about'));
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
        $this->validate($request,[
            'month'=> 'required|string',
            'tittle'=> 'required|string',
            'description'=> 'required|string'
        ]);

        $about = About::find($id);

        //DATA GET AND UPDATE
        $about->month = $request->month;
        $about->tittle = $request->tittle;
        $about->description = $request->description;

        //BIG IMAGE UPDATE
        if($request->file('big_img'))
        {
            $big_file = $request->file('big_img');
            $big_file->storeAs('public/img/','big_img.'. $big_file->hashName());
            $about->big_img = 'storage/img/big_img.' . $big_file->hashName();
        }

        $about->save();
        return redirect()->route('admin.about.list')->with('success',"About Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('admin.about.list')->with('success',"About Deleted Successfully");
    }
}
