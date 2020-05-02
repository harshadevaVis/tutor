<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'idteacher';

    public function user(){
        return $this->belongsTo(User::class,'user_master_iduser_master');
    }
    public function teacherSubjects(){
        return $this->hasMany(TeacherSubject::class,'teacher_idteacher');
    }
    public function teacherCategory(){
        return $this->hasMany(TeacherCategory::class,'teacher_idteacher');
    }

    public function teacherCity(){
            return $this->hasMany(TeacherCity::class,'teacher_idteacher');
    }

    public function comments(){
        return $this->hasOne(Comments::class,'teacher_idteacher');
    }

}
