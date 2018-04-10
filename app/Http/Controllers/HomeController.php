<?php

namespace App\Http\Controllers;
use Auth;
use App\Jobs\ChangeLocale;
use App\Models\giangvien;
use App\Models\admin;
use App\Models\SinhVien;
use App\Models\post;

class HomeController extends Controller
{

	public function __construct()
	{
		
	
		$this->middleware('user', ['except' => 'getLogout']);
		
	}
	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function SwitchDataBase($roleid,$id){
		switch($roleid)
		{
			case 1:
			return admin::find($id)->toArray();
			case 2:
			return giangvien::where('Id',$id)->first()->toArray();
			case 3:
			return SinhVien::where('Id', $id)->first()->toArray();
			default:
			return false;
		}
	}
	
	public function index()
	{
		$infoUserCurrent=Auth::user()->toArray();
		
			$id = $infoUserCurrent['id'];
	
			
			$info =$this->SwitchDataBase($infoUserCurrent['role_id'], $id);
			$posts=post::all()->toArray();
			// dd($posts);
	
		return view('front/indexNew', ['info'=>$info,'posts'=>$posts]);
	}

	
	public function language( $lang,
		ChangeLocale $changeLocale){	
		$lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
		$changeLocale->lang = $lang;
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
