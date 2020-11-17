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

Route::get('/index/firstCourse','Index\CourseController@getfirstCourse');//获取单个课程信息
Route::get('/index/getCourseChapter','Index\CourseController@getCourseChapter');//获取章程数据
Route::get('/index/getCourseSection','Index\CourseController@getCourseSection');//获取节数据
Route::get('/index/getcourseclass','Index\CourseController@getCourseClass');//获取课时数据
Route::get('/index/getvideo','Index\CourseController@getvideo');//获取视频数据
Route::get('/index/getcoursearticle','Index\CourseController@getCourseArticle');//获取课程咨询数据接口
Route::get('/index/getcoursecorrelation','Index\CourseController@getCoursecorrelation');//获取相关课程数据接口

Route::post('/add','Index\IndexController@add');




//题库
Route::get("questionindex","Question\QuestionController@index");///获取全部题
Route::get("questiondan","Question\QuestionController@dan");//获取单选题
Route::get("questionduo","Question\QuestionController@duo");//获取多选题
Route::get("questionjian","Question\QuestionController@jian");//获取简答题
Route::get("questionhot","Question\QuestionController@questionhot");//获取最热
Route::get("questionteacher","Question\QuestionController@questionteacher");//获取优秀讲师
//获取该数据关联的课程
Route::get("questioninfo/{id}","Question\QuestionController@questioninfo");

//考试
Route::get("examindex","Index\ExamController@index");
//热门考题 4条
Route::get("hotexam","Index\ExamController@hotexam");
//获取考题 详细
Route::get("examinfo/{id}","Index\ExamController@examinfo");

