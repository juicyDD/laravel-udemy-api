<?php

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




Route::get('/courses/', function(){
    return redirect('/courses/1');
});

Route::get('/courses/search/',[App\Modules\Udemy\Controllers\CoursesController::class,'search']);

Route::get('/courses-detail/{course}',[App\Modules\Udemy\Controllers\CoursesController::class,'getDetail']);

Route::get('/courses-curriculum/{course}',[App\Modules\Udemy\Controllers\CoursesController::class,'getCourseCurriculum']);

Route::get('/courses/{course}',[App\Modules\Udemy\Controllers\CoursesController::class,'show']);


Route::get('/', function () {
    return redirect('/courses/1');
});