<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\PestDiseaseController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

Route::group(['middleware'=>['auth']],function(){
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('plants',PlantController::class);
    Route::resource('pests_diseases',PestDiseaseController::class);
    Route::resource('media',MediaController::class);
    Route::resource('mothers',MotherController::class);
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
});



require __DIR__.'/auth.php';
