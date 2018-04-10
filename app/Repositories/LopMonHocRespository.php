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
use App\Models\lopmonhoc_sinhvien;

class Object
{
    public $IdLopMonHoc;
    public $TenMonBoMon;
    public $CoutSinhvien;
    public $LinkBaiTap;
    public $Listsinhvien;

}
class ObjectDanhChoGiangVien
{
    public $IdLopMonHoc;
    public $TenMonBoMon;
    public $CoutSinhvien;
    public $Checkgiangvien;
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
    public function viewListLopMonHocChoGiangVien($mon,$sinhvien){
        $lopmonhoc = lopmonhoc::all()->toArray();
        $arrayInfo = [];
        // cần thông tin toàn bộ sinh viên. sô lượng sinh viên và bộ môn 
        foreach ($lopmonhoc as $item) {
            $object = new ObjectDanhChoGiangVien;

            $idlopmonhoc = $item["IdLopMonHoc"];
            $monByidlopmonhoc = $mon->GetMonByIdLopMonHoc($idlopmonhoc);
            $tenMonBoMon = $monByidlopmonhoc["TenMon"] . "-" . $monByidlopmonhoc["BoMon"];
            $listsinhvien = $sinhvien->GetListSinhVienByIdLopMonHoc($idlopmonhoc);
            $coutSinhvien = count($listsinhvien);
            $checkgiangvien = $item["GiangVien_Id"] == null ? 0 : 1;
            //create object . handle object
            $object->IdLopMonHoc = $idlopmonhoc;
            $object->TenMonBoMon = $tenMonBoMon;
            $object->CoutSinhvien = $coutSinhvien;
            $object->Checkgiangvien = $checkgiangvien;
            $object->Listsinhvien = $listsinhvien;
            array_push($arrayInfo, $object);
            //  return $listsinhvien
        }
        return $arrayInfo;
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
    //function nay sẽ cực phức tạp
   
    public function SinhVienDangKyLopMonHoc($idlopmonhoc){
        $idUser = Auth::user()->id;
        $ThongTinSinhVienDangNhap = SinhVien::where('Id', $idUser)->first()->toArray();
        $idsinhvien = (int)$ThongTinSinhVienDangNhap["IdSinhVien"];
        // từ id sinh viên get ngược lại đc  id Lớp môn học 
        
        $lopmonhoc_sinhvien= new lopmonhoc_sinhvien;
        $lopmonhoc_sinhvien->IdLopMonHoc= $idlopmonhoc;
        $lopmonhoc_sinhvien->IdSinhVien= $idsinhvien;
        $lopmonhoc_sinhvien->save();
        
    }
    public function ViewToanBoLopMonHoc(MonRepository $mon, SinhVienRepository $sinhvien){
        $arrayMon_Id = [];
        $idUser = Auth::user()->id;
        $ThongTinSinhVienDangNhap = SinhVien::where('Id', $idUser)->first()->toArray();
        $idsinhvien = (int)$ThongTinSinhVienDangNhap["IdSinhVien"];
        $pivot = lopmonhoc_sinhvien::where('IdSinhVien', $idsinhvien)->get()->toArray();
        foreach ($pivot as $key => $value) {
            $idlopmonhoc = $value["IdLopMonHoc"];
            $lopmonhoc = lopmonhoc::findOrFail($idlopmonhoc)->toArray();
            $mon_Id = $lopmonhoc["Mon_Id"];
            // check Mon_id phải != null và chưa tồn tại trong mảng
            if ($mon_Id != null && !in_array($mon_Id, $arrayMon_Id)) {
                array_push($arrayMon_Id, $mon_Id);
            }
        }
        // id user=> thong tin sinh vien=> id sinh vien=> array id lop mon hoc -> từ mỗi id lớp
        // =>id môn  => push và
        $lopmonhoc = lopmonhoc::all()->toArray();
      
        $ListGiangVien = giangvien::all()->toArray();
        $arrayInfo = [];
        // 
        foreach ($lopmonhoc as $item) {
            $object = new ObjectDataMergen;
            $idlopmonhoc = $item["IdLopMonHoc"];
            $deadine_dangky = $item["deadine_dangky"];
          
            $monByidlopmonhoc = $mon->GetMonByIdLopMonHoc($idlopmonhoc);
            $tenMonBoMon = $monByidlopmonhoc["TenMon"] . "-" . $monByidlopmonhoc["BoMon"];
            // check in array for me wath idmon 
            $checkDkMonHoc=!in_array($monByidlopmonhoc["IdMon"], $arrayMon_Id);
            $listsinhvien = $sinhvien->GetListSinhVienByIdLopMonHoc($idlopmonhoc);
            $coutSinhvien = count($listsinhvien);
            //handle sinh viên
            $object->deadine_dangky = $deadine_dangky;
            $object->idmon= $monByidlopmonhoc["IdMon"];
            $object->CheckDkMonHoc = $checkDkMonHoc;
            $object->IdLopMonHoc = $idlopmonhoc;
            $object->TenMonBoMon = $tenMonBoMon;
            $object->CoutSinhvien = $coutSinhvien;
            $object->Listsinhvien = $listsinhvien;
            array_push($arrayInfo, $object);
            //  return $listsinhvien
        }
        return $arrayInfo;
    }
    public function LayToanBoLopMonHocSinhVienDaDk($mon,$sinhvien)
    {
        $arrayLopMonHoc=[];
        $idUser = Auth::user()->id;
        $ThongTinSinhVienDangNhap = SinhVien::where('Id', $idUser)->first()->toArray();
        $idsinhvien = (int)$ThongTinSinhVienDangNhap["IdSinhVien"];
        
        $pivot = lopmonhoc_sinhvien::where('IdSinhVien', $idsinhvien)->get()->toArray();
      
        foreach ($pivot as $key => $itemlopmonhoc_sinhvien) {
           

            $idlopmonhoc = $itemlopmonhoc_sinhvien["IdLopMonHoc"];
            $lopmonhoc = lopmonhoc::findOrFail($idlopmonhoc)->toArray();
           
            // check Mon_id phải != null và chưa tồn tại trong mảng
            
                array_push($arrayLopMonHoc, $lopmonhoc);
            
        }
       
        
        $arrayInfo = [];
        foreach ($arrayLopMonHoc as $item) {
            $object = new ObjectDataMergen;
            $idlopmonhoc = $item["IdLopMonHoc"];
            $deadine_dangky = $item["deadine_dangky"];
          
            $monByidlopmonhoc = $mon->GetMonByIdLopMonHoc($idlopmonhoc);
            $tenMonBoMon = $monByidlopmonhoc["TenMon"] . "-" . $monByidlopmonhoc["BoMon"];
            // check in array for me wath idmon 
           
            $listsinhvien = $sinhvien->GetListSinhVienByIdLopMonHoc($idlopmonhoc);
            $coutSinhvien = count($listsinhvien);
            //handle sinh viên
            $object->deadine_dangky = $deadine_dangky;
            $object->idmon = $monByidlopmonhoc["IdMon"];
            
            $object->IdLopMonHoc = $idlopmonhoc;
            $object->TenMonBoMon = $tenMonBoMon;
            $object->CoutSinhvien = $coutSinhvien;
            
            array_push($arrayInfo, $object);
            //  return $listsinhvien
        }
      
        return $arrayInfo;
    }
    public function HuyLopMonHocDaDangKy(){
        $array=Input::all();
        $idlopmonhoc=$array["idlopmonhoc"];
        $idsinhvien=(int)$array["idsinhvien"];
       $lopmonhoc= lopmonhoc_sinhvien::where([
            ['idlopmonhoc','=', $idlopmonhoc],
            ['idsinhvien', '=', $idsinhvien ]
        ]);
        $lopmonhoc->delete();

    }
    public function DataCheckAndNopBai($mon,$sinhvien){
       
        
     
    }
   
}

class objectCheckNopbai{


}
class ObjectDataMergen
{
    public $idmon;
    public $deadine_dangky;
    public $IdLopMonHoc;
    public $TenMonBoMon;
    public $CoutSinhvien;
    public $Listsinhvien;
    public $CheckDkMonHoc;
}
