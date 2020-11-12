<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseTypeModel;
use App\Model\CourseModel;

class IndexController extends Controller
{
    /**
     * 首页
     */
    public function index(){
        echo 111;
    }
    /**
     * 获取课程分类
     */
    public function getcoursetype(){
        $type_data=CourseTypeModel::limit(4)->get();
        return json_encode($type_data);
    }
    /**
     * 获取首页课程信息
     */
    public function getIndexcourse(){
        $course_type_id=request()->course_type;
        if(empty($course_type_id)){
            return json_encode(['code'=>0002,'msg'=>'缺少分类id']);die;
        }
        $course_data=CourseModel::where('course_type',$course_type_id)->limit(6)->get();
        return json_encode($course_data);
    }
    /**
     * 
     */
    public function add(){
        $data=request()->post();
        print_r($data);
    }
}
