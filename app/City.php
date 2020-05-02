<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'city';
    protected $primaryKey = 'idcity';


    public function category(){
        return $this->belongsTo(Category::class,'category_idcategory');
    }

    public function classes(){
        return $this->hasMany(Classes::class,'city_idcity');
    }

    public function teacherCity(){
        return $this->hasMany(TeacherCity::class,'city_idcity');
    }
}
