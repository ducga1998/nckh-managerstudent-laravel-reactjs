<?php namespace App\Repositories;

use App\Models\giangvien;
use App\Models\User;
use App\Models\lopmonhoc;

class GiangVienRepository extends BaseRepository
{
    protected $GiangVien;
    public function __construct(giangvien $GiangVien)
    {

        $this->GiangVien = $GiangVien;
    }
    
   
  
   public function GetGiangVienByIdLopMonHoc($idlopmonhoc){
    $lopmonhoc= lopmonhoc::find($idlopmonhoc);
     $giangvien= $lopmonhoc->LayGiangVienTrongLopMonHoc;
      dd($giangvien);
   }
   public function getAllListGiangVien(){
      $giangvien= giangvien::all()->toArray();
      return $giangvien;
   }
//    public function ThemGiangVien(){

//    }
    public function ThemGiangVien($request){
        $user=new User;
        $user->role_id =2;
        $user->confirmed=1;
        $user->username= $request["name"];
        $user->email = $request["email"];
        $user->password= bcrypt($request["password"]);

        $user->save();
        $giangvien = new giangvien;
        $id = User::count() + 1; // tất cả id đều phải theo id của User để tránh trùng lặp
        $giangvien->Id = $id;
        $giangvien->TenGiangVien = $request["name"];
        $giangvien->BoMon = $request["bomon"];
        $giangvien->Gmail=$request["email"];
        $giangvien->password = bcrypt($request["password"]);
    
        $giangvien->save();
    } 
  
    public function deleteGiangVien($idgiangvien){

        $IdUser = giangvien::where('IdGiangVien', $idgiangvien)->value('Id');
        User::where('id', $IdUser)->delete();
        giangvien::where('IdGiangVien', $idgiangvien)->delete();
       
      
	
    }
    public function DangKyMonHoc($request){
        // IdGiangVien : N01
        //     IdLopMonHoc : 3
        $IdLopMonHoc=  $request->IdLopMonHoc;
       
        $lopmonhoc=lopmonhoc::find($IdLopMonHoc);
        $lopmonhoc->GiangVien_Id = $request->IdGiangVien;
        $lopmonhoc->save();


    }

}

       