<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'Course';
    protected $primaryKey = "Id";
    public function SinhVienCourse(){
        return $this->hasMany('App\Models\SinhVien_Course','IdCourse','Id');
    }

}
