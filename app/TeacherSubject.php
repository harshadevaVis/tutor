<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    protected $table = 'teacher_subject';
    protected $primaryKey = 'idteacher_subject';

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_idteacher');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_idsubject');
    }
}
