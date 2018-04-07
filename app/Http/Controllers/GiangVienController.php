<?php

namespace App\Http\Controllers;
use Auth;
use App\Jobs\ChangeLocale;
use App\Models\giangvien;
use App\Models\admin;
use App\Models\SinhVien;
use App\Models\lopmonhoc;
use App\Repositories\LopMonHocRespository;
use App\Repositories\GiangVienRepository;
use App\Repositories\MonRepository;
use App\Repositories\SinhVienRepository;
use App\Models\linkbaitap;
use Illuminate\Http\Request;


class Object {
    public $IdLopMonHoc;
    public $TenMonBoMon;
    public $CoutSinhvien;
    public $Checkgiangvien;
    public $Listsinhvien;
   
}
class GiangVienController extends Controller
{
         // có rất nhiều lớp môn học
    public function viewListLopMonHoc(MonRepository $mon,SinhVienRepository $sinhvien){
        $IdUser= Auth::user()->id;
        $inforgiangvien= giangvien::where('Id', $IdUser)->first()->toArray();
        $lopmonhoc= lopmonhoc::all()->toArray();
        $arrayInfo=[];
        // cần thông tin toàn bộ sinh viên. sô lượng sinh viên và bộ môn 
        foreach ($lopmonhoc as $item) {
            $object =new Object;
          
            $idlopmonhoc = $item["IdLopMonHoc"];
            $monByidlopmonhoc = $mon->GetMonByIdLopMonHoc($idlopmonhoc);
            $tenMonBoMon = $monByidlopmonhoc["TenMon"] . "-" . $monByidlopmonhoc["BoMon"];
            $listsinhvien = $sinhvien->GetListSinhVienByIdLopMonHoc($idlopmonhoc);
            $coutSinhvien = count($listsinhvien);
            $checkgiangvien= $item["GiangVien_Id"]==null?0:1;
            //create object . handle object
            $object->IdLopMonHoc = $idlopmonhoc;
            $object->TenMonBoMon= $tenMonBoMon;
            $object->CoutSinhvien = $coutSinhvien;
            $object->Checkgiangvien = $checkgiangvien;
            $object->Listsinhvien = $listsinhvien;
            array_push($arrayInfo, $object);
            //  return $listsinhvien
        }
      
        //từ id lớp môn học query ra rất nhiều thứ
        return view('front.viewgiangvien.viewgiangvien',['array'=> $arrayInfo,
        'info'=>$inforgiangvien]);
    }
    public function GiangVienDangKyLopMonHoc(Request $request,
    GiangVienRepository $giangvien){
        
        $giangvien->DangKyMonHoc($request);
       
    }
    public function GetSinhVienAjax($idlopmonhoc,SinhVienRepository $sinhvien){
      $JSON=  $sinhvien->getJsonlistSinhVienByIdLopMonHoc($idlopmonhoc);
        return $JSON;
    }
    // public function viewList
    public function test(MonRepository $mon){}
    public function  ViewLopMonHocGiangVienDaDangKy(LopMonHocRespository $lopmonhoc, MonRepository $mon, SinhVienRepository $sinhvien){
       $dataMergen= $lopmonhoc->GetListLopMonHocDaDangKy($mon,$sinhvien);
       return view('front.viewgiangvien.viewdanhsachlopdadk',["dataMergen"=> $dataMergen]);
    }
    public function apiLinkBaiTap($idlopmonhoc,LopMonHocRespository $lopmonhoc){
        $data=$lopmonhoc->GetListLinkBaiTapByIdLopMonHoc($idlopmonhoc);
      return $data;
    }
    //ajax them link bai tap
    public function AJAXthemLinkBaiTap(Request $request){
        $IdLopMonHoc =  $request["idlopmonhoc"];
        $linkBaiTapRequest = $request["linkbaitap"];
        $linkbaitap=new linkbaitap;
        $linkbaitap->Id_LinkBaiTap= $IdLopMonHoc;// mặc định là id link bài tập = id lớp môn học
        $linkbaitap->LinkBaiTap= $linkBaiTapRequest;
        $linkbaitap->save();
    }
 }
