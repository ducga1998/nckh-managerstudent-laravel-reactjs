<?php namespace App\Repositories;

use App\Models\SinhVien;
use App\Models\User;
use App\Models\giangvien;
use App\Models\lopmonhoc;
use App\Models\Mon;


class MonRepository extends BaseRepository
{
    protected $Mon;
    public function __construct(Mon $mon)
    {

        $this->Mon = $mon;
    }
    // trả về một môn bằng id Lop môn học
    public function GetMonByIdLopMonHoc($idlopmonhoc){
        $lopmonhoc=lopmonhoc::find($idlopmonhoc);
        $mon=$lopmonhoc->LayMonTrongLopMonHoc->toArray();
       return $mon;
    }


}

       