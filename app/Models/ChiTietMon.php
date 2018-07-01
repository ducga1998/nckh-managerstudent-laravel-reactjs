<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietMon extends Model
{
    protected $table = 'ChiTietMon';
    // protected $primaryKey = "IdMon";
    public function NoiDungMonTuChiTietMon(){
        return $this->belongsToMany('App\Models\NoiDungMonHoc','IdNoiDung','IdMon');
    }
}