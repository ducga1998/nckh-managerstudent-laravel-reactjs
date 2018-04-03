<?php namespace App\Http\Controllers;

use Auth;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use App\Repositories\BlogRepository;
use App\Models\lopmonhoc;
use App\Repositories\CommentRepository;
use App\Repositories\GiangVienRepository;
use App\Repositories\LopRepository;
use App\Repositories\SinhVienRepository;
use App\Repositories\MonRepository;
use App\Models\SinhVien;
use App\Models\lophoc;
use App\Models\khoahoc;
use App\Models\giangvien;
use Illuminate\Http\Request;
use App\Models\admin;

class Object
{
	public $IdLopMonHoc;
	public $TenMonBoMon;
	public $CoutSinhvien;
	public $Checkgiangvien;
	public $Listsinhvien;

}
class AdminController extends Controller {

    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_gestion;

    /**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct(UserRepository $user_gestion)
    {
		$this->user_gestion = $user_gestion;
    }

	/**
	* Show the admin panel.
	*
	* @param  App\Repositories\ContactRepository $contact_gestion
	* @param  App\Repositories\BlogRepository $blog_gestion
	* @param  App\Repositories\CommentRepository $comment_gestion
	* @return Response
	*/
	public function admin(
		ContactRepository $contact_gestion, 
		BlogRepository $blog_gestion,
		CommentRepository $comment_gestion)
	{	
		$nbrMessages = $contact_gestion->getNumber();
		$nbrUsers = $this->user_gestion->getNumber();
		$nbrPosts = $blog_gestion->getNumber();
		$nbrComments = $comment_gestion->getNumber();

		return view('back.index', compact('nbrMessages', 'nbrUsers', 'nbrPosts', 'nbrComments'));
	}

	/**
	 * Show the media panel.
	 *
     * @return Response
	 */
	public function filemanager()
	{
		$url = config('medias.url') . '?langCode=' . config('app.locale');
		
		return view('back.filemanager', compact('url'));

	}
	public function postAddGiangVien(Request $request,GiangVienRepository $giangvien){
	
		$giangvien->ThemGiangVien($request);
		
	}
	public function GetGiangVien(GiangVienRepository $giangvien){
		$listgiangvien=$giangvien->getAllListGiangVien();
		
		return view('front/listgiangvien',['list'=>$listgiangvien]);
	}
	public function DeleteGiangVien(Request $request,GiangVienRepository $giangvien){
		$giangvien->deleteGiangVien($request->id);
	}
	//end controller giangvien
	//controller lophoc
	public function LayToanBoLopHoc(LopRepository $lophoc){
		$useArrayLopHoc = lophoc::all()->toJson();
		return $useArrayLopHoc;
	
	}
	
	public function AllSinhVien(){
		$sinhvien=SinhVien::all()->toArray();
		$useArrayLopHoc =lophoc::all()->toArray();
		
			return view("front/listsinhvien",['list'=>$sinhvien, 'useArrayLopHoc'=> $useArrayLopHoc]);
	}
	//api 
	public function AllSinhVienTheoKhoa($idkhoa){
		$idkhoa =(int)$idkhoa;
		$sinhvientheokhoa=SinhVien::all()->where('IdKhoaHoc', $idkhoa);
		return $sinhvientheokhoa->toJson();
		
	}
	
	public function AllSinhVienTheoLop($idlophoc){
		$idlophoc =(int)$idlophoc;
		$sinhvientheolop = SinhVien::all()->where('IdLop', $idlophoc);
		return $sinhvientheolop->toJson();
	}
	public function AllKhoaHoc(){
		 $jsonKhoaHoc= khoahoc::all()->toJson();
		return $jsonKhoaHoc;
	}
	//ajax
	public function ThemSinhVienAjax(SinhVienRepository $sinhvien,Request $request){
	
		$sinhvien->ThemSinhVienAJaxSP($request);
	}
	//view  quan lý lớp môn học
	public function ViewLopMonHoc(MonRepository $mon, SinhVienRepository $sinhvien)
	{
		$IdUser = Auth::user()->id;
		$inforadmin = admin::where('Id', $IdUser)->first()->toArray();
		$lopmonhoc = lopmonhoc::all()->toArray();
		$arrayInfo = [];
        // cần thông tin toàn bộ sinh viên. sô lượng sinh viên và bộ môn 
		foreach ($lopmonhoc as $item) {
			$object = new Object;
		
			$idlopmonhoc = $item["IdLopMonHoc"];
			$monByidlopmonhoc = $mon->GetMonByIdLopMonHoc($idlopmonhoc);
			$tenMonBoMon = $monByidlopmonhoc["TenMon"] . "-" . $monByidlopmonhoc["BoMon"];
			$listsinhvien = $sinhvien->GetListSinhVienByIdLopMonHoc($idlopmonhoc);
			$coutSinhvien = count($listsinhvien);
			$checkgiangvien = $item["GiangVien_Id"] == null ? 0 : 1;
			//truy vấn dài vãi cả đái
			//nếu mà có đăng ký thì in tên . ko có thì trả về 0
			if($checkgiangvien==1){
				$tengiangvien = giangvien::where('IdGiangVien', $item["GiangVien_Id"])->get(['TenGiangVien'])->first()->TenGiangVien;
			}
			else{
				$tengiangvien="a";
			}
			
			//create object . handle object
			$object->TenGiangVienDK= $tengiangvien;
			$object->IdLopMonHoc = $idlopmonhoc;
			$object->TenMonBoMon = $tenMonBoMon;
			$object->CoutSinhvien = $coutSinhvien;
			$object->Checkgiangvien = $checkgiangvien;
			$object->Listsinhvien = $listsinhvien;
			array_push($arrayInfo, $object);
            //  return $listsinhvien
		}
      
        //từ id lớp môn học query ra rất nhiều thứ
		return view('front.listlopmonhoc', [
			'array' => $arrayInfo,
			'info' => $inforadmin
		]);
	}

}
