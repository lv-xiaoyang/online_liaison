<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    //指定表名
    protected $table="course";
    // 指定主键id
    protected $primaryKey="course_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
