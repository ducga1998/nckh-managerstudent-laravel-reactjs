<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuaTrinhHoc_SinhVienCourse extends Model
{
    protected $table = 'QuaTrinhHocSinhVien';
    // protected $primaryKey = "IdMon";
    public function ThongTinSinhVienTuKetQuaQuaTrinh(){
        return $this->belongsToMany('App\Models\SinhVien_Course', 'IdLopMonHoc', 'IdSinhVien');
    }
   
}
