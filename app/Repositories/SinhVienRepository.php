<?php namespace App\Repositories;

use App\Models\SinhVien;
use App\Models\User;
use App\Models\giangvien;
use App\Models\lopmonhoc;
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
        public function getAllSinhVienTrongLop($id){
        $sinhvientronglop = SinhVien::all()->where('IdLop', $id)->toArray();
       
        return $sinhvientronglop;
    }
    // chỉ cần request
    public function ThemSinhVienAJaxSP($request){
        $idkhoa = $request->idkhoa;
        $idsinhvien = $request->idsinhvien;
        $idlophoc=    $request->idlophoc;
        $gioitinh =     $request->gioitinh;
        $tensinhvien =   $request->tensinhvien;
        $password =   $request->password;
        $handleUserName= str_replace(' ', '', $tensinhvien); // xóa tất cả khoảng trắng để làm usename
        //thêm cả user vào 
        $id = User::count() + 2;
        $user = new User;
        $user->role_id = 3;
        $user->confirmed = 1;

        $user->username = $handleUserName;
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
}
