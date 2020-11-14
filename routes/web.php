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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index','Index\IndexController@index');
Route::get('/getcoursetype','Index\IndexController@getcoursetype');//获取首页分类接口
Route::get('/getIndexcourse','Index\IndexController@getIndexcourse');//获取首页课程接口



Route::post('/add','Index\IndexController@add');





