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
use App\Models\sinhviennopbai;
use Illuminate\Http\Request;



class SinhVienController extends Controller
{
    public function ViewTatCaSinhVienCungLop(SinhVienRepository $sinhvien){
        $listsinhvien= $sinhvien->getAllSinhVienTrongLop();
        $tenlop= $sinhvien->getTenLopByIdSinhVien();
       return view('front.ViewSinhVien.ListSinhVienTrongLopHoc',['ListSinhVien'=> $listsinhvien,'TenLop'=>$tenlop]);
    }
    public function ViewDangKyLopMonHoc(LopMonHocRespository $lopmonhoc, MonRepository $mon, SinhVienRepository $sinhvien){
        $dataMergen = $lopmonhoc->ViewToanBoLopMonHoc($mon,$sinhvien);
        return view('front.ViewSinhVien.ViewChonLopMonHoc',["dataMergen" => $dataMergen]);
    }
    public function SinhVienDangKyHoc($idlopmonhoc,LopMonHocRespository $lopmonhoc){
        $lopmonhoc->SinhVienDangKyLopMonHoc($idlopmonhoc);
        return redirect()->back();
    }
    public function LayToanBoLopHocSinhVienDaDk(LopMonHocRespository $lopmonhoc, MonRepository $mon, SinhVienRepository $sinhvien){
        $dataMergen=   $lopmonhoc->LayToanBoLopMonHocSinhVienDaDk($mon,$sinhvien);
        $idUser = Auth::user()->id;
        $ThongTinSinhVienDangNhap = SinhVien::where('Id', $idUser)->first()->toArray();
        $idsinhvien = (int)$ThongTinSinhVienDangNhap["IdSinhVien"];
       
        return view('front.ViewSinhVien.ViewLopMonHocDaChon', ["dataMergen" => $dataMergen,"idsinhvien"=>$idsinhvien]);
    }
    public function HuyLopMonHocDaDangKy(LopMonHocRespository $lopmonhoc){
        $lopmonhoc->HuyLopMonHocDaDangKy();
    }
    public function LayBaiTap(LopMonHocRespository $lopmonhoc, MonRepository $mon, SinhVienRepository $sinhvien){
    
        $dataMergen = $lopmonhoc->LayToanBoLopMonHocSinhVienDaDk($mon, $sinhvien);
        $idUser = Auth::user()->id;
        $ThongTinSinhVienDangNhap = SinhVien::where('Id', $idUser)->first()->toArray();
     return view('front.ViewSinhVien.LayBaiTap', ["dataMergen" => $dataMergen,'infosinhvien'=> $ThongTinSinhVienDangNhap]);
    }
    public function ListBaiTapByIdLopMonHoc($idlopmonhoc,GiangVienRepository $giangvien){
        $listlinkbaitap=$giangvien->LayAPiListBaiTap($idlopmonhoc);
        $json = json_encode($listlinkbaitap);
        return $json;
    }
    public function NopBaiTap(Request $request){
        /* linkbainop: linkbainop,
      idlopmonhoc: idlopmonhoc,
      idsinhvien: idsinhvien */
        $linkbainop=$request["linkbainop"];
        $idlopmonhoc = $request["idlopmonhoc"];
        $idsinhvien = $request["idsinhvien"];
        $sinhviennopbai=new sinhviennopbai;
        $sinhviennopbai->Id_LopMonHoc= $idlopmonhoc;
        $sinhviennopbai->IdSinhVien=$idsinhvien;
        $sinhviennopbai->linkNop= $linkbainop;
        $sinhviennopbai->save();

    }
    public function ViewTaiLieu(){
        return view('front.ViewSinhVien.ViewLayTaiLieu');
    }

}
