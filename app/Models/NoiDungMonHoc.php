<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoiDungMonHoc extends Model
{
    protected $table = 'NoiDungMon';
    protected $primaryKey = "Id";
    public function LayTatCaChiTietNoiDungMonHoc(){
        return $this->hasMany('App\Models\ChiTietMon','IdNoiDung','Id');
    }
    public function MonCuaNoiDung(){
        return $this->belongsToMany('App\Models\Mon', 'IdMon', 'IdMon');
    }

}
