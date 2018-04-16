<?php namespace App\Repositories;

use App\Models\lophoc;
use App\Models\SinhVien;
use Illuminate\Support\Facades\Input;
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
    public function  ThemLopHocAjAx(){
        $countLopHoc = lophoc::count() + 1;
        $arrayRequestLop= Input::all();
        $idkhoahoc= $arrayRequestLop["khoahoc"];
        $tenlop= $arrayRequestLop['tenlop'];
        $lop=new lophoc;
        
        $lop->IdLop=$countLopHoc;
        $lop->TenLop= $tenlop;
        $lop->IdKhoaHoc= $idkhoahoc;
        $lop->save();
    }
    public function XoaLopHoc(){
        $arrayRequestLop = Input::all();
        $idlop = $arrayRequestLop['idlop'];

    }
    public function LayListSinhVienBangIdLopHoc(){
        $arrayRequestLop = Input::all();
        $lophoc = lophoc::find($idlop);
        $list = $lophoc->LayToanBoSinhVienTrongLop->toArray();
        dd($lopmonhoc);

    }

   

}

       