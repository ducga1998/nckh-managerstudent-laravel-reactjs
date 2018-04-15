<?php

namespace App\Http\Controllers;
use Auth;
use App\Jobs\ChangeLocale;
use App\Models\giangvien;
use App\Models\Course;


use App\Models\admin;
use App\Models\SinhVien;
use App\Models\lopmonhoc;

use App\Repositories\LopMonHocRespository;
use App\Repositories\GiangVienRepository;
use App\Repositories\KhoaHocRepository;


use App\Repositories\MonRepository;
use App\Repositories\SinhVienRepository;
use App\Models\linkbaitap;


use Illuminate\Http\Request;
use App\Repositories\NoiDungRepository;



class GiangVienController extends Controller
{
   
         // có rất nhiều lớp môn học
    public function viewListLopMonHoc(LopMonHocRespository $lopmonhoc,MonRepository $mon,SinhVienRepository $sinhvien){
        $IdUser= Auth::user()->id;
        $inforgiangvien= giangvien::where('Id', $IdUser)->first()->toArray();

        $arrayInfo= $lopmonhoc->viewListLopMonHocChoGiangVien($mon, $sinhvien);
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
        $deadline=$request["deadline"];
        $linkbaitap=new linkbaitap;
        $linkbaitap->Id_LinkBaiTap= $IdLopMonHoc;// mặc định là id link bài tập = id lớp môn học
        $linkbaitap->LinkBaiTap= $linkBaiTapRequest;
        $linkbaitap->deadline= $deadline;
        $linkbaitap->save();
    }
    public function caclopdangtrongquatrinhday(LopMonHocRespository $lopmonhoc, MonRepository $mon, SinhVienRepository $sinhvien){
        $dataMergen = $lopmonhoc->QuanLySinhVienDaNopBai();
        return view('front.viewgiangvien.ViewCacLopTrongQuaTrinhDay', ["dataMergen" => $dataMergen]);
    }
    public function QuanLyTaiLieu(MonRepository $Mon, NoiDungRepository $noidung){
        $idmonhoc = Auth::user()->phutrach;
        $noidung = $noidung->ToanBoNoiDungMonHoc($idmonhoc);
       
        return view('front.viewgiangvien.QuanLyTaiLieu',['idmonhoc'=> $idmonhoc,'ArrayNoiDung'=> $noidung]);
    }
 public function ajaxUpNoiDung(Request $request,NoiDungRepository $noidung){
    $noidung->ThemNoiDung($request);
 }  
 
 public function ChiTietNoiDungMonHoc($idnoidung,NoiDungRepository $noidung){
        $chitietnoidung= $noidung->LayToanBoChiTietMonHocTuIdNoiDung($idnoidung);
    return $chitietnoidung;
 }
 public function ThemChiTietNoiDung(Request $request,NoiDungRepository $noidung)
 {
                $noidung->ThemChiTietNoiDung($request);
 }
 public function ViewQuanLyKhoaHoc(MonRepository $mon){
   $allmon= $mon->GetToanBoMonHoc();
  $idUser= Auth::user()->id;
$TenGiangVien=giangvien::where('Id',$idUser)->first()->TenGiangVien;
$Course=Course::all()->toArray();

     return view('front.viewgiangvien.ViewQuanLyKhoaHoc',['Course'=> $Course,'ArrayMon'=> $allmon, "TenGiangVien"=>$TenGiangVien]);
 }
 public function ThemKhoaHocChoGiangVien(Request $request, KhoaHocRepository $khoahoc)
 {
        $khoahoc->ThemKhoaHoc($request);
 }
}
