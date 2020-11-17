<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    //指定表名
    protected $table="question";
    // 指定主键id
    protected $primaryKey="question_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
    
}
