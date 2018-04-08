<?php namespace App\Repositories;

use App\Models\SinhVien;
use App\Models\User;
use App\Models\giangvien;
use App\Models\lopmonhoc;
use App\Models\lophoc;
use Illuminate\Support\Facades\Input;
use Auth;
class SinhVienRepository extends BaseRepository
{
        protected $SinhVien;
        public function __construct(SinhVien $SinhVien){
            
            $this->SinhVien = $SinhVien;
        }
       
    public function ThemSinhVien($request)
    {
        $user = new User;
        $user->role_id = 2;
        $user->confirmed = 1;
        $user->username = $request["name"];
        $user->email = $request["email"];
        $user->password = $request["password"];
        $user->save();

        $giangvien = new giangvien;
        $id = giangvien::count() + 1;
        $giangvien->Id = $id;
        $giangvien->TenGiangVien = $request["name"];
        $giangvien->BoMon = $request["bomon"];
        $giangvien->Gmail = $request["email"];
        $user->password = $request["password"];
        $giangvien->save();
    }
    public function getAllSinhVienTrongLop(){
        $id=Auth::user()->id;
        $idlopsinhdanghoc=sinhvien::where('Id',$id)->first()->toArray();
        $sinhvientronglop = SinhVien::all()->where('IdLop', $idlopsinhdanghoc["IdLop"])->toArray();
        return $sinhvientronglop;
    }
    public function getTenLopByIdSinhVien()
    {
        $id = Auth::user()->id;
        $idlopsinhdanghoc = sinhvien::where('Id', $id)->first()->toArray();
        $lophoc=lophoc::find($idlopsinhdanghoc["IdLop"]);
         return $lophoc["TenLop"];
    }
    // chỉ cần request
    public function ThemSinhVienAJaxSP($request){
        $idkhoa = $request->idkhoa;
        $idsinhvien = $request->idsinhvien;
        $idlophoc=    $request->idlophoc;
        $gioitinh =     $request->gioitinh;
        $tensinhvien =   $request->tensinhvien;
        $password =   $request->password;
         // xóa tất cả khoảng trắng để làm usename
        //thêm cả user vào 
        $id = User::count() + 1;
        $user = new User;
        $user->id= $id ;
        $user->role_id = 3;
        $user->confirmed = 1;

        $user->username = $idsinhvien;
        $user->email="auto@gmail.com";
        
        $user->password = bcrypt($password);
        $user->id= $id;
        $user->save();
       // trach viec bi lap id, lay id user lam chuan , get no bang cach de
        // dem so luong user roi lay no lam id
        $sinhvien=new SinhVien;
        $sinhvien->Id= $id ;
        $sinhvien->IdSinhVien=$idsinhvien;
        $sinhvien->TenSv=$tensinhvien;
        $sinhvien->GioiTinh=$gioitinh;
        $sinhvien->IdKhoaHoc=$idkhoa;
        $sinhvien->password= bcrypt($password);
        $sinhvien->IdLop=$idlophoc;
        $sinhvien->save();

    }
    public function GetSinhVienByIdSinhVien($idsinhvien){
               $sinhvien= SinhVien::find($idsinhvien)->toArray();
               return $sinhvien;
    }
    // trả về array list sinh viên
    public function GetListSinhVienByIdLopMonHoc($idlopmonhoc)
    {
        
        $lopmonhoc = lopmonhoc::find($idlopmonhoc);
        $Listsinhvien = $lopmonhoc->LayToanBoSinhVienTrongLopMonHoc->toArray();
        return $Listsinhvien;
   
    }
    public function getJsonlistSinhVienByIdLopMonHoc($idlopmonhoc){
        $lopmonhoc = lopmonhoc::find($idlopmonhoc);
        $Listsinhvien = $lopmonhoc->LayToanBoSinhVienTrongLopMonHoc->toJson();
        
        return $Listsinhvien;
    }
    //update
    public function UpdateInfoSv(){
       $array= Input::all();
    /* khoahoc: khoahoc,
      ngaysinh: ngaysinh,
      idsinhvien: idsinhvien,
      tensinhvien: tensinhvien*/ 
     $sinhvien= SinhVien::find($array['idsinhvien']);
    
     $sinhvien->TenSv= $array['tensinhvien'];
     $sinhvien->NgaySinh=$array['ngaysinh'];
     $sinhvien->IdKhoaHoc= $array['khoahoc'];
    $sinhvien->save();

    }
    public function DeleteSinhVien($IdSinhVien){

       $sinhvien= SinhVien::find($IdSinhVien);
       $sinhvien->delete();
    }
}
