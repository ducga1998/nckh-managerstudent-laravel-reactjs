<?php namespace App\Repositories;

use App\Models\SinhVien;
use App\Models\User;
use App\Models\giangvien;
use App\Models\lopmonhoc;
use App\Models\Mon;
use Illuminate\Support\Facades\Input;

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
    public function GetToanBoMonHoc(){
        $monhoc=Mon::all()->toArray();
        return $monhoc;
    }
    public function ThemMonHocAjAx(){
       
        $array= Input::all();
        $tenmon= $array['tenmon'];
        $tinchi = $array['tinchi'];
        $bomon = $array['bomon'];
        $mon=new Mon;
        $mon->TenMon=$tenmon;
        $mon->SoTinChi=$tinchi;
        $mon->BoMon=$bomon;
        $mon->save();
    }
    public function deleteMonHoc(){
        $mon=Mon::find($idmonhoc);
    }
    public function XuLyMonHocCoGiangVienPhuTrach(){
       $user= user::all()->pluck('phutrach')->toArray();
       $userFilter=[];
        foreach($user as $itemUser)
        {
            if($itemUser!=null){
                array_push($userFilter,$itemUser);
            }
        }
       $arrayidmon= mon::all()->pluck('IdMon')->toArray();
        $arrayObject=[];
        foreach ($arrayidmon as  $idmon) {
            # code...
            if(in_array($idmon,$userFilter)){
              $ObjectMonHoc=new ObjectMonHoc;
              $ObjectMonHoc->TenGiangVienPhuTrach=User::where('phutrach',$idmon)->first()->username;
                $ObjectMonHoc->InfoMon=mon::find($idmon)->toArray();
                array_push($arrayObject,$ObjectMonHoc);

            }

            else{
                  $ObjectMonHoc=new ObjectMonHoc;
              $ObjectMonHoc->TenGiangVienPhuTrach="";
                $ObjectMonHoc->InfoMon=mon::find($idmon)->toArray();
                array_push($arrayObject,$ObjectMonHoc);
            }
        }
      return $arrayObject;
    }



}
class ObjectMonHoc{
    public $TenGiangVienPhuTrach;
    public $InfoMon;
}

       