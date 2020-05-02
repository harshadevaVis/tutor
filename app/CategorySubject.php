<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySubject extends Model
{
    protected $table = 'category_subject';
    protected $primaryKey = 'idcategory_subject';

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_idsubject');
    }
}
