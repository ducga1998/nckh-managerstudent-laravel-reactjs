<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien_Course extends Model
{
    protected $table = 'SinhVien_Course';
    protected $primaryKey = "IdSinhVien";
    public function LayQuaTrinhHocCuaSinhVien(){
        return $this->hasMany('App\Models\QuaTrinhHoc_SinhVienCourse', 'IdSinhVien_Course', 'IdSinhVien');
    }
    public function GetCourse(){
        return $this->belongsToMany('App\Models\Course','IdCourse','Id');
    }

}
