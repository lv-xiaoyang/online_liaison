<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseChapterModel extends Model
{
    //指定表名
    protected $table="course_chapter";
    // 指定主键id
    protected $primaryKey="chapter_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
