<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CourseModel;
use App\Model\CourseClassModel;
use App\Model\CourseVideoModel;
use App\Model\CourseChapterModel;
use App\Model\CourseSectionModel;
use App\Model\ArticleModel;

class CourseController extends Controller
{
    /**
     * 课程详情接口
     */
    public function getfirstCourse(){
        $course_id=request()->course_id;
        // dd($course_id);
        if(empty($course_id)){
            return json_dencode(['code'=>0003,'msg'=>'缺少course_id这个必要参数']);die;
        }
        //获取总课时
        $course_class=COurseVideoModel::select('video_time')->where('course_id',$course_id)->get()->toArray();
        // dd($course_class);
        $course_num=count($course_class);
        $h='';
        $i='';
        $s='';
        foreach($course_class as $v){
            $v['video_time']=explode(':',$v['video_time']);
            $h .=   $v['video_time'][0].',';
            $i .=   $v['video_time'][1].',';
            $s .=   $v['video_time'][2].',';
        }
        $h=rtrim($h,',');
        $i=rtrim($i,',');
        $s=rtrim($s,',');
        $h=explode(',',$h);
        $i=explode(',',$i);
        $s=explode(',',$s);
        $h=array_sum($h);
        $i=array_sum($i);
        $s=array_sum($s);
        $i=$i+ceil($s/60);
        $h=$h+ceil($i/60);
        //获取单个课程
        $first_data=CourseModel::leftjoin('lect','course.course_type','=','lect.lect_id')->where('course_id',$course_id)->first();
        $first_data['course_video_time_h']=$h;
        $first_data['course_video_time_i']=$i;
        $first_data['course_num']=$course_num;
        return json_encode($first_data);
    }
    /**
     * 获取章程数据
     */
    public function getCourseChapter(){
        $course_id=request()->course_id;
        if(empty($course_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        //根据课程id获取章程数据
        $chapter_data=CourseChapterModel::where('course_id',$course_id)->get()->toArray();
        // dd($chapter_data);
        return json_encode($chapter_data);
    }
    /**
     * 获取节数据接口
     */
    public function getCourseSection(){
        $course_id=request()->course_id;
        if(empty($course_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $chapter_id=request()->chapter_id;
        if(empty($chapter_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        //根据课程id获取节数据
        $sectionWhere=[
            ['chapter_id','=',$chapter_id],
            ['course_id','=',$course_id]
        ];
        $section_data=CourseSectionModel::where($sectionWhere)->get()->toArray();
        // dd($section_data);
        return json_encode($section_data);
    }
    /**
     * 获取课时数据接口
     */
    public function getCourseClass(){
        $course_id=request()->course_id;
        if(empty($course_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $chapter_id=request()->chapter_id;
        if(empty($chapter_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $section_id=request()->section_id;
        if(empty($section_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $sectionWhere=[
            ['chapter_id','=',$chapter_id],
            ['course_id','=',$course_id],
            ['section_id','=',$section_id]
        ];
        $class_data=CourseClassModel::where($sectionWhere)->get()->toArray();
        return json_encode($class_data);
    }
    /**
     * 获取课程咨询接口
     */
    public function getCourseArticle(){
        $course_id=request()->course_id;
        if(empty($course_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $article_data=ArticleModel::where('course_id',$course_id)->orderBy('ati_wen','desc')->limit(2)->get()->toArray();
        // dd($article_data);
        return json_encode($article_data);
    }
    /**
     * 相关课程数据接口
     */
    public function getCoursecorrelation(){
        $course_id=request()->course_id;
        if(empty($course_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $coursetype_id=request()->coursetype_id;
        if(empty($coursetype_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $correlation_where=[
            ['course_id','!=',$course_id],
            ['course_type','=',$coursetype_id]
        ];
        $correlation_data=CourseModel::where($correlation_where)->orderBy('course_view','desc')->limit(3)->get()->toArray();
        if(empty($correlation_data)){
            return json_encode(['code'=>0004,'msg'=>'没有这一条数据']);die;
        }
        return json_encode($correlation_data);
    }
    /**
     * 获取视频信息接口
     */
    public function getvideo(){
        $class_id=request()->class_id;
        if(empty($class_id)){
            return json_encode(['code'=>0003,'msg'=>'缺少必要参数']);die;
        }
        $video_data=CourseVideoModel::where('class_id',$class_id)->first()->toArray();
        if(empty($video_data)){
            return json_encode(['code'=>0004,'msg'=>'数据有误']);die;
        }else{
            return json_encode(['code'=>0001,'data'=>$video_data]);
        }

    }
}
