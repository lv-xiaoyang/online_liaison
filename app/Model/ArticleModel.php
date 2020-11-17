<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    //指定表名
    protected $table="article";
    // 指定主键id
    protected $primaryKey="ati_id";
    // 关闭时间chuo1
    public $timestamps = false;
}
