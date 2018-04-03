<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'sinhvien';
    protected $fillable = ['IdSinhVien'];
    protected $primaryKey= "IdSinhVien";
    protected $hidden = ['password'];
    public function lophocsinhviendanghoc(){
        return $this->belongsTo('App\Models\lophoc','IdSinhVien','IdLop');

    }
    public function LayToanBoLopMonHocCuaSinhVien()
    {
        return $this->belongsToMany('App\Models\lopmonhoc', 'lopmonhoc_sinhvien', 'IdLopMonHoc', 'IdSinhVien');
    }
    public function KhoaSinhDangHoc(){
        return $this->belongsTo('App\Models\khoahoc','IdSinhVien', 'IdKhoaHoc');
    }
    
    
}
