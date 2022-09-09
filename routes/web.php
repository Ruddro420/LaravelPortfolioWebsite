<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\LogoPageController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfoliosPagesController;
use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CategoryPagesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [PagesController::class,'index'])->name('home'); 

Route::prefix('admin')->group(function()
{

Route::get('/main', [MainPagesController::class,'index'])->name('main');
Route::put('/main', [MainPagesController::class,'update'])->name('admin.main.update');

Route::get('/dash', [MainPagesController::class,'dash'])->name('dashboard');

Route::get('/logo', [LogoPageController::class,'logo'])->name('logo');
Route::put('/logo', [LogoPageController::class,'update'])->name('admin.logo.update');

Route::get('/services/create', [ServicePagesController::class,'create'])->name('create');
Route::post('/services/create', [ServicePagesController::class,'store'])->name('admin.services.store');
Route::get('/services/list', [ServicePagesController::class,'list'])->name('list');
Route::get('/services/edit{id}', [ServicePagesController::class,'edit'])->name('admin.services.edit');
Route::post('/services/update/{id}', [ServicePagesController::class,'update'])->name('admin.services.update');
Route::delete('/services/destroy/{id}', [ServicePagesController::class,'destroy'])->name('admin.services.destroy');

// PortFolio

Route::get('/portfolios/create', [PortfoliosPagesController::class,'create'])->name('admin.portfolios.create');
Route::put('/portfolios/create', [PortfoliosPagesController::class,'store'])->name('admin.portfolios.store');
Route::get('/portfolios/list', [PortfoliosPagesController::class,'list'])->name('admin.portfolios.list');
Route::get('/portfolios/edit{id}', [PortfoliosPagesController::class,'edit'])->name('admin.portfolios.edit');
Route::post('/portfolios/update/{id}', [PortfoliosPagesController::class,'update'])->name('admin.portfolios.update');
Route::delete('/portfolios/destroy/{id}', [PortfoliosPagesController::class,'destroy'])->name('admin.portfolios.destroy');


// About

Route::get('/about/create', [AboutPagesController::class,'create'])->name('admin.about.create');
Route::put('/about/create', [AboutPagesController::class,'store'])->name('admin.about.store');
Route::get('/about/list', [AboutPagesController::class,'list'])->name('admin.about.list');
Route::get('/about/edit{id}', [AboutPagesController::class,'edit'])->name('admin.about.edit');
Route::post('/about/update/{id}', [AboutPagesController::class,'update'])->name('admin.about.update');
Route::delete('/about/destroy/{id}', [AboutPagesController::class,'destroy'])->name('admin.about.destroy');

//Category

Route::get('/category/create', [CategoryPagesController::class,'create'])->name('admin.category.create');
Route::put('/category/create/', [CategoryPagesController::class,'store'])->name('admin.category.store');
Route::get('/category/list', [CategoryPagesController::class,'list'])->name('admin.category.list');
Route::get('/category/edit{id}', [CategoryPagesController::class,'edit'])->name('admin.category.edit');
Route::post('/category/update/{id}', [CategoryPagesController::class,'update'])->name('admin.category.update');
Route::delete('/category/destroy/{id}', [CategoryPagesController::class,'destroy'])->name('admin.category.destroy');



});

Route::post('/contact',[ContactFormController::class,'store'])->name('contact.store');





Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
