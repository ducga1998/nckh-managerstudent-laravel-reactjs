<?php
use App\Models\SinhVien;
use App\Models\giangvien;
use App\Models\lophoc;
use App\Models\lopmonhoc;
use App\Repositories\LopMonHocRespository;
use App\Repositories\MonRepository;
use App\Repositories\SinhVienRepository;
Route::group(['middleware' => ['web']], function () {	

	// Home
	Route::get('/', [
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);
	// Admin
	Route::get('admin', [
		'uses' => 'AdminController@admin',
		'as' => 'admin',
		'middleware' => 'admin'
	]);

	Route::get('medias', [
		'uses' => 'AdminController@filemanager',
		'as' => 'medias',
		'middleware' => 'redac'
	]);
	// User


	Route::put('userseen/{user}', 'UserController@updateSeen');
	// Authentication routes...
	Route::resource('user', 'UserController');
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	
	Route::group(['middleware' => ['admin']], function () {
		Route::get('quanlylistmon', 'AdminController@viewQuanLyMon');
		Route::get('/quanlylistlophoc', 'AdminController@ViewQuanLyLopHoc');
		Route::get('/listgiangvien', 'AdminController@GetGiangVien');
		Route::get('/listsinhvien', 'AdminController@AllSinhVien');
		Route::get('listlopmonhoc', 'AdminController@ViewLopMonHoc');
		Route::get('/taolopmonhocbangtay', "AdminController@ViewTaoLopMonHoc");
		Route::get('/taotudong', 'AdminController@ViewTudong');
		Route::get('ViewPost', 'AdminController@ViewVietPost');
		Route::get('quanlyphutrachtailieucacmonhoc', 'AdminController@QuanLyPhuTrachTaiLieu');
		//end manager lop hoc
	});
	Route::post('AjaxPhutTrach', 'AdminController@PhuTrachTaiLieu');
	Route::post('MoDangKyHocChoSinhVien', 'AdminController@MoDangKyLopMonHoc');
	Route::post('hethandangkyhoc', 'AdminController@HetHanDangKy');
	Route::post('ajaxBoNhiemGiangVienDayLopMonHoc', 'AdminController@BoNhiemGiangVien');
	Route::post('ajaxXoaGiangVienLopMonHoc', 'AdminController@XoaGiangVienDayLopHocDcChon');
	Route::post('ajaxupdategiangvien', 'AdminController@updategiangvien');
	Route::post('ajaxxoasinhvien', 'AdminController@DeleteSinhvien');
	Route::post('ajaxUpdateSinhVien', 'AdminController@UpdateInfoSinhVien');
	Route::post('ajaxthemmon', 'AdminController@themmon');
	Route::post('ajaxthemlophoc', 'AdminController@themlophoc');
	Route::post("/themgiangvien", 'AdminController@postAddGiangVien');
	Route::post('themsinhvienajax', 'AdminController@ThemSinhVienAjax');
	Route::post('/listgiangvien/deletegiangvien', 'AdminController@DeleteGiangVien');
	Route::post('/ajaxautothemlopmonhoc', 'AdminController@ThemAutoLopMonHoc');
	Route::post("/ajaxthemmonhoc", "AdminController@ThemLopMonHoc");// ajax thêm môn học
	Route::post('ajaxThemPost', "AdminController@AJAXThemPost");
	
	Route::get(
		'/listsinhvientheolophoc/{idlophoc}',
		['uses' => 'AdminController@AllSinhVienTheoLop']
	);
	//end middlware admin access
	Route::get('GetSinhVienTheoIdSinhVien/{idsinhvien}', 'AdminController@LaySinhVienBangIdSinhVien');
	Route::get('/listsinhvientheokhoa/{idkhoa}', 'AdminController@AllSinhVienTheoKhoa');
	Route::get('/listlophoc', 'AdminController@LayToanBoLopHoc');
	Route::get('listkhoahoc', 'AdminController@AllKhoaHoc');
	Route::get("profileMe","AdminController@profileview");
	

	//end request to AdminController
	//start request to GiangVienController 
	Route::group(['middleware' => ['redac']], function () {
		Route::get('taodulieuchokhoahoc/{idcourse}','GiangVienController@taodulieu');
		Route::get('quanlysinhviendadkkhoahoc', 'GiangVienController@QuanlysinhViendkKhoahoc');
		Route::get('listlopmonhocviewgiangvien', 'GiangVienController@viewListLopMonHoc');
		Route::get('viewlistlopmonhocGiangVien', 'GiangVienController@ViewLopMonHocGiangVienDaDangKy');
		Route::get('/quanlysinhviendanopbai', 'GiangVienController@caclopdangtrongquatrinhday');
		Route::get('caclopdangtrongquatrinhday', 'GiangVienController@caclopdangtrongquatrinhday');
		Route::get('QuanLyTaiLieu', 'GiangVienController@QuanLyTaiLieu');
	});
	Route::get('APINoidungCourse', 'GiangVienController@APINoiDungCourse');
	Route::post('AJAXThemKhoaHoc', 'GiangVienController@ThemKhoaHocChoGiangVien');
	Route::get('apinoidungmonhoc/{idmon}', 'GiangVienController@ApiNoiDungMonHoc');
	Route::get('GetLinkApiLinkBaiTap/{idlopmonhoc}', 'GiangVienController@apiLinkBaiTap');
	//ajax giang viên đăng ký môn học
	Route::post('AjaxThemChiTietNoiDung', 'GiangVienController@ThemChiTietNoiDung');
	Route::post('AjaxUpNoiDung', 'GiangVienController@ajaxUpNoiDung');
	Route::post('/ajaxgiangviendangkylopmonhoc', 'GiangVienController@GiangVienDangKyLopMonHoc');
	Route::post('/themlinkbaitap', 'GiangVienController@AJAXthemLinkBaiTap');
	Route::get('/ajaxlistlopsinhvien/{idlopmonhoc}', "GiangVienController@GetSinhVienAjax");
	//GiangVienController end
	//SinhViencontroller handle start
	Route::group(['middleware' => ['user']], function () {
			Route::get('LayTaiLieuTungMonHoc', 'SinhVienController@ViewTaiLieu');
	});
	
	Route::get('ViewQuanLyKhoaHoc', 'GiangVienController@ViewQuanLyKhoaHoc');
	Route::get('ChiTietNoiDungMonHoc/{idnoidung}', 'GiangVienController@ChiTietNoiDungMonHoc');
	Route::get('/listsinhvienlopdanghoc', 'SinhVienController@ViewTatCaSinhVienCungLop');
	Route::get('/dangkylopmonhoc', 'SinhVienController@ViewDangKyLopMonHoc')->name('viewdangkymonhoc');
	Route::get('/LopMonHocSinhVienDaDangNhapDaDangKy', 'SinhVienController@LayToanBoLopHocSinhVienDaDk');
	Route::get('LayBaiTap', 'SinhVienController@LayBaiTap');
	Route::get('ListLinkBaiTap/{idlopmonhoc}', 'SinhVienController@ListBaiTapByIdLopMonHoc');
	Route::post('AJAXNopBaiTap', 'SinhVienController@NopBaiTap');
	Route::post('AJAXDangKyKhoaHoc','SinhVienController@DangKyKhoaHoc');
	Route::get('sinhviendangkylopmonhoc/{idlopmonhoc}', 'SinhVienController@SinhVienDangKyHoc');
	Route::get('ViewLopKhoaHocDangHoc', 'SinhVienController@ViewLopKhoaHocDangHoc');
	Route::post('HuyLopMonHocDaDangKy', 'SinhVienController@HuyLopMonHocDaDangKy');
	Route::get('ApiTaiLieu/{idmon}', 'SinhVienController@ApiLayTaiLieu');
	//phần test code
	Route::get('ViewDangKyKhoaHoc', 'SinhVienController@viewdangkykhoahoc');
	Route::get('routes', function () {
		\Artisan::call('route:list');
		return '<pre>' . \Artisan::output() . '</pre>';
	});
	Route::get('bcrypt', function () {
		return bcrypt('admin');
	});
	// Route::get('test',function(LopMonHocRespository $lop){
	// 	$lop->HuyLopMonHocDaDangKy();
	
	// });
});