<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'idcomments';

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_idteacher');
    }

    public function user(){
        return $this->belongsTo(User::class,'iduser_master');
    }
}
