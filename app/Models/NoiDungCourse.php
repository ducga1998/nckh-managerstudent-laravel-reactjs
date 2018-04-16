<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoiDungCourse extends Model
{
    protected $table = 'noidungCourse';
    protected $primaryKey = "Id";
    public function LayChiTietNoiDungKhoaHoc()
    {
        return $this->hasMany('App\Models\ChiTietCourse', 'IdCourse', 'Id');
    }
    public function ThongTinCourse()
    {
        return $this->belongsToMany('App\Models\Course', 'IdCourse', 'Id');
    }
    
}
