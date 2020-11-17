<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    //指定表名
    protected $table="exam";
    // 指定主键id
    protected $primaryKey="exam_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
