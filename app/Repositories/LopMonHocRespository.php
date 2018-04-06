<?php namespace App\Repositories;

use App\Models\lophoc;
use App\Models\SinhVien;
use App\Models\lopmonhoc;
use App\Models\giangvien;
use Illuminate\Support\Facades\Input;
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
    public function ThemLopMonHoc($request){
       $IdLopMonHoc= $request["IdLopMonHoc"];
        $IdMon = $request["IdMon"];
       

       $lopmonhoc= new lopmonhoc;
       $lopmonhoc->IdLopMonHoc= $IdLopMonHoc;
        $lopmonhoc->Mon_Id = $IdMon;
        $lopmonhoc->save();
       

    }
    public function ThemAutoLopMonHoc($request){
        $array = Input::all();
        foreach ($array["ArrayIdLopMonHoc"] as $item) {
            $MonHoc_id = explode("-", $item)[2];
            $data = array(
                'IdLopMonHoc' => $item,
                'Mon_Id' => $MonHoc_id
            );

            $insertData[] = $data;
        }

        lopmonhoc::insert($insertData);
    }
   
    public function XoaGiangVienDay(){
        $array=Input::all();
        $idlopmonhoc=$array['idlopmonhoc'];
        $lopmonhoc=lopmonhoc::find($idlopmonhoc);
        $lopmonhoc->GiangVien_Id=null;
        $lopmonhoc->save();
    }
    public function BoNhiemGiangVien(){
        $array=Input::all();
        $idlopmonhoc=$array['idlopmonhoc'];
        $idgiangvien=$array['idgiangvien'];
        $lopmonhoc=lopmonhoc::find($idlopmonhoc);
        $lopmonhoc->GiangVien_Id= $idgiangvien;
        $lopmonhoc->save();
    }



}

      