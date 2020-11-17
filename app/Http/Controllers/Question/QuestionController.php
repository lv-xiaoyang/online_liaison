<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuestionModel;
use \App\Model\TeacherModel;

class QuestionController extends Controller
{
    //
    public function index(){
    	//获取全部数据
    	// $data = QuestionModel::paginate(4);
        $data = QuestionModel::get();
    	return json_encode($data);
    }
    public function dan(){
    	//获取全部单选题
    	$where = [
    		'question_type_id'=>1
    	];
    	// $data = QuestionModel::where($where)->paginate(4);
    	$data = QuestionModel::where($where)->get();
        return json_encode($data);
    }
    public function duo(){
    	// 获取全部多选题
    	$where = [
    		'question_type_id'=>2
    	];
    	// $data = QuestionModel::where($where)->paginate(4);
        $data = QuestionModel::where($where)->get();
    	return json_encode($data);
    }
    public function jian(){
    	// 获取全部简答题
    	$where = [
    		'question_type_id'=>3
    	];
    	// $data = QuestionModel::where($where)->paginate(4);
        $data = QuestionModel::where($where)->get();
    	return json_encode($data);
    }
    //热门题
    public function questionhot(){
    	// $data = QuestionModel::orderBy("question_time","desc")->paginate();
        $data = QuestionModel::orderBy("question_time","desc")->paginate(4);
    	// dd($data);
        return json_encode($data);

    }
    public function questionteacher(){
        $data = TeacherModel::orderBy("lereg_edu","desc")->paginate(3);
        // dd($data);
        return json_encode($data);
    }
    public function questioninfo($question_id){
        $where = [
            "question_id"=>$question_id
        ];
        $data = QuestionModel::leftjoin("course","question.course_id","=","course.course_id")
                            ->leftjoin("course_section","question.section_id","=","course_section.section_id")
                            ->leftjoin("course_class","question.class_id","=","course_class.class_id")
                            ->leftjoin("course_chapter","question.chapter_id","=","course_chapter.chapter_id")
                            ->where($where)
                            ->first();
        return json_encode($data);
    }
}
