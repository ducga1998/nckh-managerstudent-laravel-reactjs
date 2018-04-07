<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class linkbaitap extends Model
{
    protected $table = 'linkbaitap';
    
    public function LayLopMonHocTheoLinkBaiTap()
    {
        return $this->belongsTo('App\Models\lopmonhoc', 'Id_LinkBaiTap', 'IdLopMonHoc');
    }
  
}
