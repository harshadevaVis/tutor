<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'idcategory';

    public function classes(){
        return $this->hasMany(Classes::class,'category_idcategory');
    }

    public function classesCount()
    {
        return count($this->classes);
    }
}
