<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lopmonhoc extends Model
{
    protected $table = 'lopmonhoc';
    protected $primaryKey= 'IdLopMonHoc';
    public $incrementing = false;
    protected $hidden =['password'];
    public function LayGiangVienTrongLopMonHoc()
    {
        return $this->belongsTo('App\Models\giangvien', 'GiangVien_Id', 'IdGiangVien' );
    }
    public function LayToanBoSinhVienTrongLopMonHoc()
    {
        return $this->belongsToMany('App\Models\SinhVien','lopmonhoc_sinhvien','IdLopMonHoc', 'IdSinhVien' );
    }
    public function LayMonTrongLopMonHoc()
    {
        return $this->belongsTo('App\Models\Mon','Mon_Id','IdMon');
    }
  


}
