<?php namespace App\Repositories;

use App\Models\giangvien;
use App\Models\User;
use App\Models\lopmonhoc;
use App\Models\linkbaitap;
use Illuminate\Support\Facades\Input;
class GiangVienRepository extends BaseRepository
{
    protected $GiangVien;
    public function __construct(giangvien $GiangVien)
    {

        $this->GiangVien = $GiangVien;
    }
    public function GetGiangVienByIdLopMonHoc($idlopmonhoc)
    {
        $lopmonhoc= lopmonhoc::find($idlopmonhoc);
        $giangvien= $lopmonhoc->LayGiangVienTrongLopMonHoc;
        dd($giangvien);
   }
   public function getAllListGiangVien(){
      $giangvien= giangvien::all()->toArray();
      return $giangvien;
   }
    public function ThemGiangVien($request){
        $user=new User;
        $id = User::count() + 1;
        $user->id=$id;
        $user->role_id =2;
        $user->confirmed=1;
        $user->username= $request["name"];
        $user->email = $request["email"];
        $user->password= bcrypt($request["password"]);

        $user->save();
        $giangvien = new giangvien;
         // tất cả id đều phải theo id của User để tránh trùng lặp
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
        $IdLopMonHoc=  $request->IdLopMonHoc;
        $lopmonhoc=lopmonhoc::find($IdLopMonHoc);
        $lopmonhoc->GiangVien_Id = $request->IdGiangVien;
        $lopmonhoc->save();
    }

    public function UpdateInfoGiangVien()
    {
        $array = Input::all();
        $giangvien = giangvien::find($array['idgiangvien']);
        $giangvien->Gmail = $array['gmail'];
        $giangvien->BoMon = $array['bomon'];
        $giangvien->TenGiangVien = $array['tengiangvien'];
        $giangvien->password= bcrypt($array["password"]);
        $giangvien->save();

    }
    public function DeleteSinhVien($IdSinhVien)
    {
        $giangvien = giangvien::find($IdSinhVien);
        $giangvien->delete();
    }
    public function LayAPiListBaiTap($idlopmonhoc){
        $listlinkbaitap = linkbaitap::where('Id_LinkBaiTap', $idlopmonhoc)->get()->toJson();
        $lopmonhoc = lopmonhoc::find($idlopmonhoc);
        $mon=$lopmonhoc->LayMonTrongLopMonHoc->toArray();
        $giangvien = $lopmonhoc->LayGiangVienTrongLopMonHoc->toArray();
        $objectlinkbaitap= new ObjectLinkBaiTap;
        $objectlinkbaitap->tengiangvien= $giangvien["TenGiangVien"];
        $objectlinkbaitap->listlinkbaitap= $listlinkbaitap;
        $objectlinkbaitap->tenmonbomon =$mon["TenMon"]."-".$mon["BoMon"];
        return $objectlinkbaitap;
}


}
class ObjectLinkBaiTap
{
    public $tengiangvien;
    public $tenmonbomon;
    public $listlinkbaitap;
}

       