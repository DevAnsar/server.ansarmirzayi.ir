<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ResumeController;
use App\Http\Controllers\Admin\SettingController;
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
Route::middleware('auth')->prefix('admin')->as('admin.')->group(function (){
    Route::get('/',[IndexController::class,'dashboard'])->name('dashboard');
    Route::resource('resumes',ResumeController::class);
    Route::get('settings',[SettingController::class,'index'])->name('settings.index');
    Route::post('settings/update',[SettingController::class,'update'])->name('settings.update');
});

Route::get('/', [IndexController::class,'home']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
