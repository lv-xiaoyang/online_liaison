<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ExamModel;
use App\Model\EqModel;

class ExamController extends Controller
{
    //
    public function index(){
    	$data = ExamModel::get();
    	$data = json_encode($data);
    	return $data;
    }
    //热门考题
    public function hotexam(){
    	$data = ExamModel::orderBy("exam_id","desc")->paginate(4);
    	return json_encode($data);
    }
    //考题详情
    public function examinfo($exam_id){
    	$where = [
    		'exam_question.exam_id'=>$exam_id
    	];
    	$data = EqModel::leftjoin("question","exam_question.question_id","=","question.question_id")
    					->leftjoin("exam","exam_question.exam_id","=","exam.exam_id")
    					->where($where)
    					->get();
    	// dd($data);
    	return json_encode($data);
    }
}
