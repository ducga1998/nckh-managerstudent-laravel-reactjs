<?php namespace App\Repositories;

use App\Models\lophoc;
use App\Models\SinhVien;

class LopRepository extends BaseRepository
{
    protected $lophoc;
    public function __construct(lophoc $lophoc)
    {

        $this->lophoc = $lophoc;
    }
    public function ToanBoLopHoc(){
       return $lophoc = lophoc::all();
      
    }
    public function GetToanBoLopMonHoc(){
        return lophoc::all()->toArray();
    }

   

}

       