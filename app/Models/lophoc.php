<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lophoc extends Model
{
    protected $table = 'lophoc';
    protected $primaryKey= "IdLop";
    public function LayToanBoSinhVienTrongLop()
    {
        return $this->hasMany('App\Models\SinhVien', 'IdSinhVien', 'IdLop');

    }
}
