<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class giangvien extends Model
{
    protected $table = 'giangvien';
    protected $primaryKey = "IdGiangVien";
    //get het tat ca lopmonhpc ma giang vien dang day
    public function LayToanBoLopGiangVienDay()
    {
        return $this->hasMany('App\Models\lopmonhoc', 'GiangVien_Id','IdGiangVien');
    }
   
   
}
