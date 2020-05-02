<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherCategory extends Model
{
    protected $table = 'teacher_category';
    protected $primaryKey = 'idteacher_category';

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_idteacher');
    }
}
