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
	Route::get('user/sort/{role}', 'UserController@indexSort');
	Route::get('user/roles', 'UserController@getRoles');
	Route::post('user/roles', 'UserController@postRoles');

	Route::put('userseen/{user}', 'UserController@updateSeen');
	// Authentication routes...
	Route::resource('user', 'UserController');
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');
	Route::group(['middleware' => ['admin']], function () {
		route::get('quanlylistmon', 'AdminController@viewQuanLyMon');
		Route::get('/quanlylistlophoc', 'AdminController@ViewQuanLyLopHoc');
		Route::get('/listgiangvien', 'AdminController@GetGiangVien');
		//end manager giang vien
		Route::get('/listsinhvien', 'AdminController@AllSinhVien');
		Route::get('listlopmonhoc', 'AdminController@ViewLopMonHoc');
		//end manager lop hoc
	});

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
	Route::get('/taolopmonhocbangtay', "AdminController@ViewTaoLopMonHoc");
	Route::get('/taotudong','AdminController@ViewTudong');
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
	Route::get('GetLinkApiLinkBaiTap/{idlopmonhoc}', 'GiangVienController@apiLinkBaiTap');
	Route::get('listlopmonhocviewgiangvien','GiangVienController@viewListLopMonHoc');
	Route::get('viewlistlopmonhocGiangVien', 'GiangVienController@ViewLopMonHocGiangVienDaDangKy');
	//ajax giang viên đăng ký môn học
	Route::post('/ajaxgiangviendangkylopmonhoc', 'GiangVienController@GiangVienDangKyLopMonHoc');
	Route::post('/themlinkbaitap', 'GiangVienController@AJAXthemLinkBaiTap');
	Route::get('/ajaxlistlopsinhvien/{idlopmonhoc}', "GiangVienController@GetSinhVienAjax");
	//GiangVienController end
	//SinhViencontroller handle start
	Route::get('/listsinhvienlopdanghoc', 'SinhVienController@ViewTatCaSinhVienCungLop');
	Route::get('/dangkylopmonhoc', 'SinhVienController@ViewDangKyLopMonHoc')->name('viewdangkymonhoc');
	Route::get('sinhviendangkylopmonhoc/{idlopmonhoc}', 'SinhVienController@SinhVienDangKyHoc');
	//phần test code
	Route::get('routes', function () {
		\Artisan::call('route:list');
		return '<pre>' . \Artisan::output() . '</pre>';
	});
	Route::get('bcrypt', function () {
		return bcrypt('admin');
	});
	Route::get('test',function(LopMonHocRespository $lop, MonRepository $mon, SinhVienRepository $sinhvien){
	$data=$lop->ViewToanBoLopMonHoc($mon, $sinhvien);
	dd($data);
	});
});