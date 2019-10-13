<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    
    //titleとbodyが入力されているかチェック
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
}
