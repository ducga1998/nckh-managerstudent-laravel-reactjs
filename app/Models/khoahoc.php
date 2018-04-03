<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class khoahoc extends Model
{
    protected $table = 'khoahoc';
    public function LayToanBoSinhVienTrongKhoa(){
        return $this->hasMany('App\Models\SinhVien','IdSinhVien', 'IdKhoaHoc');
    }
}
