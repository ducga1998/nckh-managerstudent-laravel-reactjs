<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mon extends Model
{
    protected $table ='mon';
    protected $primaryKey="IdMon";
    public function LayLopMonHocTheoMon()
    {
        return $this->hasMany('App\Models\lopmonhoc','Mon_Id', 'IdMon' );
    }
    public function LayTatCaNoiDungMonHoc(){
        return $this->hasMany('App\Models\NoiDungMonHoc','IdMon','IdMon');
    }
}
