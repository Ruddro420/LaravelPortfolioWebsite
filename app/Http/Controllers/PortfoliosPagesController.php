<?php

namespace App\Http\Controllers;


use App\Models\Portfolios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfoliosPagesController extends Controller
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
        return view('pages.portfolios.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolio = Portfolios::all();
        return view('pages.portfolios.list',compact('portfolio'));
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
            'tittle'=> 'required|string',
            'sub_tittle'=> 'required|string',
            'big_img'=> 'required|image',
            'small_img'=> 'required|image',
            'description'=> 'required|string',
            'clint'=> 'required|string',
            'category'=> 'required|string'
        ]);

        $portfolio = new Portfolios;

        $portfolio->tittle = $request->tittle;
        $portfolio->sub_tittle = $request->sub_tittle;
        $portfolio->description = $request->description;
        $portfolio->clint = $request->clint;
        $portfolio->category = $request->category;
        
        //For Big Image Store in databse

        $big_file = $request->file('big_img');
        storage::putFile('public/img/',$big_file);
        $portfolio->big_img = "storage/img/".$big_file->hashName();

        //For Small Image Store in databse
        
        $small_file = $request->file('small_img');
        storage::putFile('public/img/',$small_file);
        $portfolio->small_img = "storage/img/".$small_file->hashName();

        $portfolio->save();
        return redirect()->route('admin.portfolios.create')->with('success',"New Portfolio Created Successfully");
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
        $portfolio = Portfolios::find($id);
        return view('pages.portfolios.edit',compact('portfolio'));
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
            'tittle'=> 'required|string',
            'sub_tittle'=> 'required|string',
            'description'=> 'required|string',
            'clint'=> 'required|string',
            'category'=> 'required|string'
        ]);

        $portfolio = Portfolios::find($id);

        //DATA GET AND UPDATE
        $portfolio->tittle = $request->tittle;
        $portfolio->sub_tittle = $request->sub_tittle;
        $portfolio->description = $request->description;
        $portfolio->clint = $request->clint;
        $portfolio->category = $request->category;

        //BIG IMAGE UPDATE
        if($request->file('big_img'))
        {
            $big_file = $request->file('big_img');
            $big_file->storeAs('public/img/','big_img.'. $big_file->hashName());
            $portfolio->big_img = 'storage/img/big_img.' . $big_file->hashName();
        }

        
        //Small IMAGE UPDATE
        if($request->file('small_img'))
        {
            $small_file = $request->file('small_img');
            $small_file->storeAs('public/img/','small_img.'. $small_file->hashName());
            $portfolio->small_img = 'storage/img/small_img.' . $small_file->hashName();
        }

        $portfolio->save();
        return redirect()->route('admin.portfolios.list')->with('success',"Services Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolios::find($id);
        $portfolio->delete();
        return redirect()->route('admin.portfolios.list')->with('success',"Services Deleted Successfully");
    }
}
