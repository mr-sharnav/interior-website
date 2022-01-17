<?php

use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ProjectConstructionController;
use App\Http\Controllers\ProjectConstructionImageController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\ProjectInteriorController;
use App\Http\Controllers\ServiceConstructionController;
use App\Http\Controllers\ServiceInteriorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () 
{
    // ASSIGNNG A ROLE IF NOT EXISTS
    $user = Auth::user();
   if( $user->hasAnyRole('super-admin', 'admin')){
    return view('admin.index');
   }else{
    $user->assignRole('admin');
    return view('admin.index');
   }

})->name('dashboard');

Route::get('/user/logout', [ManageUserController::class, 'logout'])->name('logout');


Route::middleware(['auth:sanctum', 'role:super-admin'])->group(function () {

    Route::resource('/user/management', ManageUserController::class);
});
Route::middleware(['auth:sanctum', 'role:super-admin|admin'])->group(function () {


    Route::resource('/service/interior', ServiceInteriorController::class);
    Route::resource('/service/construction',ServiceConstructionController::class);
    Route::resource('/construction/project',ProjectConstructionController::class);
    Route::resource('/projectinterior',ProjectInteriorController::class);
    Route::resource('/project-image',ProjectImageController::class);
    Route::resource('/project-construction-image',ProjectConstructionImageController::class);
});
