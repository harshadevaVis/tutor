<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'idclass';

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_idsubject');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_idcategory');
    }

    public function user(){
        return $this->belongsTo(User::class,'iduser_master');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_idcity');
    }
}
