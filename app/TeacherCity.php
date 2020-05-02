<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherCity extends Model
{
    protected $table = 'teacher_city';
    protected $primaryKey = 'idteacher_city';

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_idteacher');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_idcity');
    }
}
