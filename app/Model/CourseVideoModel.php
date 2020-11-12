<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseVideoModel extends Model
{
    //指定表名
    protected $table="course_video";
    // 指定主键id
    protected $primaryKey="video_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
