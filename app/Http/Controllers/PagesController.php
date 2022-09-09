<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Logo;
use App\Models\Service;
use App\Models\Portfolios;
use App\Models\About;

class PagesController extends Controller
{
  
  
    public function index()
    {
        $main = Main::first();
        $logo = logo::first();
        $services = Service::all();
        $portfolio = Portfolios::all();
        $about = About::all();
        return view('pages.index' ,compact('main','services','portfolio','about'),compact('logo'));
    }


 

}
