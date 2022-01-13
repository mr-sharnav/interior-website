<?php

use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ServiceInteriorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[ManageUserController::class,'logout'])->name('logout');


Route::middleware(['auth:sanctum','role:super-admin'])->group(function(){

    Route::resource('/user/management',ManageUserController::class);
    
});
Route::middleware(['auth:sanctum','role:super-admin|admin'])->group(function(){
   
  route::get('/service/interior/',[ServiceInteriorController::class,'index'])->name('service.interior');
    
});



