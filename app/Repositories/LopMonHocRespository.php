<?php namespace App\Repositories;

use App\Models\lophoc;
use App\Models\SinhVien;
use App\Models\lopmonhoc;
use App\Models\giangvien;

class LopMonHocRespository extends BaseRepository
{
    protected $lopmonhoc;
    public function __construct(lopmonhoc $lopmonhoc)
    {

        $this->lopmonhoc = $lopmonhoc;
    }
    // lấy tất cả các môn theo Id Lớp môn Học
   
  
   
    public function getLopMonHocByIdGiangVien($idgiangvien){
      $giangvien=  giangvien::find($idgiangvien);
      $lopmonhoc=  $giangvien->LayToanBoLopGiangVienDay->toArray();
      dd($lopmonhoc);
    }



}

       