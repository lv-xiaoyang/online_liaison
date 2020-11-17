<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EqModel extends Model
{
    //指定表名
    protected $table="exam_question";
    // 指定主键id
    protected $primaryKey="eq_id";
    // 关闭时间chuo1
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
