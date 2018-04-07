<?php namespace App\Repositories;

use App\Models\lophoc;
use App\Models\SinhVien;
use App\Models\lopmonhoc;
use App\Models\giangvien;
use App\Repositories\MonRepository;
use App\Repositories\SinhVienRepository;
use Illuminate\Support\Facades\Input;
use App\Models\linkbaitap;
use Auth;

class Object
{
    public $IdLopMonHoc;
    public $TenMonBoMon;
    public $CoutSinhvien;
    public $LinkBaiTap;
    public $Listsinhvien;

}
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
                'Mon_Id' => $MonHoc_id,
                'Id_LinkBaiTap'=>$item,
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
    //sử dụng 3 model, rồi trộn data cần thiết rồi view lên
    public function GetListLopMonHocDaDangKy($mon, $sinhvien){
        $arrayLopmonHocColinkbaitap=[];
        $IdUser = Auth::user()->id;
        $giangvien = giangvien::where('Id', $IdUser)->first();
        
        $lopmonhoc=$giangvien->LayToanBoLopGiangVienDay;
        $arrayInfo = [];
        // cần thông tin toàn bộ sinh viên. sô lượng sinh viên và bộ môn 
        foreach ($lopmonhoc as $itemlopmonhoc) {
            $object = new Object;
            $linkbaitap = $itemlopmonhoc->LayToanBoLinkMonHoc;
            $arraylopmonhoc = $itemlopmonhoc->toArray();
            $idBaitap = $arraylopmonhoc["Id_LinkBaiTap"]; // lay id bai tap tung lop mon hoc
            $linkbaitap = linkbaitap::where('Id_LinkBaiTap', $idBaitap)->get()->toArray(); // lay list link bai tap theo id lop mon hic
            $idlopmonhoc = $arraylopmonhoc["IdLopMonHoc"];
            $monByidlopmonhoc = $mon->GetMonByIdLopMonHoc($idlopmonhoc);
            $tenMonBoMon = $monByidlopmonhoc["TenMon"] . "-" . $monByidlopmonhoc["BoMon"];
            $listsinhvien = $sinhvien->GetListSinhVienByIdLopMonHoc($idlopmonhoc);
            $coutSinhvien = count($listsinhvien);
             //create object . handle object
            $object->LinkBaiTap= $linkbaitap;
            $object->IdLopMonHoc = $idlopmonhoc;
            $object->TenMonBoMon = $tenMonBoMon;
            $object->CoutSinhvien = $coutSinhvien;
            $object->Listsinhvien = $listsinhvien;
            array_push($arrayInfo, $object);
            //  return $listsinhvien
        }
        
        return $arrayInfo;
    }
    public function GetListLinkBaiTapByIdLopMonHoc($idlopmonhoc){
       
        $lopmonhoc=lopmonhoc::find($idlopmonhoc)->toArray();
        $idBaitap=$lopmonhoc["Id_LinkBaiTap"];
        $linkbaitap = linkbaitap::where('Id_LinkBaiTap', $idBaitap)->get();
        return $linkbaitap->toJson();




    }
  



}

      