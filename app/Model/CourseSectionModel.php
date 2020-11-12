<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseSectionModel extends Model
{
    //指定表名
    protected $table="course_section";
    // 指定主键id
    protected $primaryKey="section_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
