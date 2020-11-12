<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseTypeModel extends Model
{
    //指定表名
    protected $table="course_type";
    // 指定主键id
    protected $primaryKey="type_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
?>