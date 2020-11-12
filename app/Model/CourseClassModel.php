<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseClassModel extends Model
{
     //指定表名
     protected $table="course_class";
     // 指定主键id
     protected $primaryKey="class_id";
     // 关闭时间chuo1
     public $timestamps = false;
}
