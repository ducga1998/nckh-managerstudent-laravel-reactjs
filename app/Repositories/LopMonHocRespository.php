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
       
     
       
            // foreach ($array as  $item) {

            
           
            // 
            // $IdMon= $arrayString[2];
        //     $lopmonhoc = new lopmonhoc;

        //     $lopmonhoc->IdLopMonHoc = $item;
        //     $lopmonhoc->Mon_Id = 1;
            
        //     }
        // $name = $request->title;
        // $description = $request->email;



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
    // public function ThemLopMonHocHelp($idlopmonhoc){
     
    // }



}

      