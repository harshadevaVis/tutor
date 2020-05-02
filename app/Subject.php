<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'idsubject';

    public function teacherSubjects(){
        return $this->belongsTo(TeacherSubject::class,'subject_idsubject');
    }

    public function categorySubjects(){
        return $this->belongsTo(CategorySubject::class,'subject_idsubject');
    }

    public function classes(){
        return $this->hasMany(Classes::class,'subject_idsubject');
    }
}
