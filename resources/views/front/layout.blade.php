<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />

	<title>
		Metronic | Dashboard
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	@include('common.linkCSS')
	<!--end::Base Styles -->

	<link rel="shortcut icon" href="{{URL::asset('assets/demo/default/media/img/logo/favicon.ico')}}" />

	<style>
		.hiden {
			display: none;
		}
	</style>
	<script>
	</script>
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	{{-- @include('common.loading') --}}
	<div id="wait" style="display: none; position: fixed;left: 50%;z-index: 100000;top: 50%;" class="cssload-thecube">
		<div class="cssload-cube cssload-c1"></div>
		<div class="cssload-cube cssload-c2"></div>
		<div class="cssload-cube cssload-c4"></div>
		<div class="cssload-cube cssload-c3"></div>
	</div>
	{{--
	<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:fixed;top:50%;left:50%;padding:2px;">
		<img src='demo_wait.gif' width="64" height="64" />
		<br>Loading..</div> --}}
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header class="m-grid__item    m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="index.html" class="m-brand__logo-wrapper">
									<img alt="" src="assets/demo/default/media/img/logo/logo_default_dark.png" />
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block ">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Header Menu Toggler -->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>
								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>
					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<!-- BEGIN: Horizontal Menu -->
						<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
							<i class="la la-close"></i>
						</button>
						<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">

						</div>
						<!-- END: Horizontal Menu -->
						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">

								

									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
									    data-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__userpic">
												<img src="{{asset('assets/app/media/img/users/user4.jpg')}}" class="m--img-rounded m--marginless m--img-centered" alt=""
												/>
											</span>
											<span class="m-topbar__username m--hide">
												Nick
											</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
													<div class="m-card-user m-card-user--skin-dark">
														<div class="m-card-user__pic">
															<img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt="" />
														</div>
														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">
																{{ Auth::user()->username }}

															</span>
															<a href="" class="m-card-user__email m--font-weight-300 m-link">
																{{ Auth::user()->email }}
															</a>
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">
																	Section
																</span>
															</li>
															<li class="m-nav__item">
																<a href="{{url('profileMe')}}" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-profile-1"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">
																				Thông tin tài khoản
																			</span>
																			
																		</span>
																	</span>
																</a>
															</li>




															<li class="m-nav__separator m-nav__separator--fit"></li>
															<li class="m-nav__item">
																<a href="{{url('auth/logout')}}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																	Logout
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
									
								</ul>
							</div>
						</div>
						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>
		<!-- END: Header -->
		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
				<i class="la la-close"></i>
			</button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
				<!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true"
				    data-menu-scrollable="false" data-menu-dropdown-timeout="500">
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
							<a href="{{url("/")}}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-line-graph"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Bảng Thông Tin Mới
										</span>
										<span class="m-menu__link-badge">
											<span class="m-badge m-badge--danger">
												2
											</span>
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__section">
							<h4 class="m-menu__section-text">
								@if(session('statut') == 'admin'|| session('statut') == 'redac') Quản lý @endif @if(session('statut') == 'user') Xem Tình
								hình học tập 
								@endif
							</h4>
							<i class="m-menu__section-icon flaticon-more-v3"></i>
						</li>
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
							<a href="#" class="m-menu__link m-menu__toggle autoclick">
								<i class="m-menu__link-icon flaticon-layers"></i>
								<span class="m-menu__link-text">
									@if(session('statut') == 'admin'|| session('statut') == 'redac') Quản lý @endif @if(session('statut') == 'user') Học Tập
									@endif

								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
										<a href="#" class="m-menu__link ">
											<span class="m-menu__link-text">
												@if(session('statut') == 'admin'|| session('statut') == 'redac') 
													Quản lý
												@endif 
												@if(session('statut') == 'user') 
													Học tập
												@endif

											</span>
										</a>
									</li>
									@if(session('statut') == 'admin' )
									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/listsinhvien ")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Quản Lý Danh sách sinh viên
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url('/listgiangvien')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Quản lý danh sách giảng viên
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/listlopmonhoc ")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Quản lý danh sách Lớp môn học
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/quanlylistlophoc ")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Quản lý danh sách Lớp học
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/quanlylistmon ")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Quản lý Môn Học
											</span>
										</a>
									</li>
									@endif 
									@if(session('statut') == 'redac')

									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/listlopmonhocviewgiangvien")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Đăng ký các lớp môn học
											</span>
										</a>
									</li>

									@endif
									{{-- của sinh viên --}}
									 @if(session('statut') == 'user')

									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/listsinhvienlopdanghoc")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
											Tất cả Các Sinh Viên Lớp Đang Học
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true">
										<a href="{{url("/dangkylopmonhoc")}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
											Đăng ký lớp môn học
											</span>
										</a>
									</li>

									@endif

								</ul>
							</div>
						</li>

						<li class="m-menu__section">
							<h4 class="m-menu__section-text">
							@if(session('statut') == 'admin' ||session('statut') == 'redac')
								Quản lý Lớp môn học
							@endif
							@if(session('statut') == 'user')
								Quản lý Phần Môn Học
							@endif
							
									</h4>
						<i class="m-menu__section-icon flaticon-more-v3"></i>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
							<a href="#" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-interface-3"></i>
								<span class="m-menu__link-text">
									@if(session('statut') == 'admin' ) Tạo Lớp Môn Học @endif 
									@if(session('statut') == 'redac' ) Quản lý Lớp Môn Học @endif

								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
										<a href="#" class="m-menu__link ">
											<span class="m-menu__link-text">
												@if(session('statut') == 'admin' ) Tạo Lớp Môn Học @endif
												@if(session('statut') == 'redac' ) Quản lý Lớp Môn Học @endif
												@if(session('statut') == 'user' ) Xem Các Lớp Đã Đăng ký @endif
											</span>
										</a>
									</li>
									@if(session('statut') == 'admin' )
									<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
										<a href="{{url('taolopmonhocbangtay')}}" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Tạo Bằng tay
											</span>

										</a>

									</li>
									<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
										<a href="{{url('taotudong')}}" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Tạo Tự động
											</span>

										</a>

									</li>
									@endif 
									@if(session('statut') == 'redac' )
									<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
										<a href="{{url('viewlistlopmonhocGiangVien')}}" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Tất cả các lớp môn học đã đăng ký
											</span>

										</a>

									</li>
									@endif
									
									@if(session('statut') == 'user' )
									<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="false" data-menu-submenu-toggle="hover">
										<a href="" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Xem Các lớp Đã Đăng ký
											</span>

										</a>

									</li>
									@endif
								</ul>
							</div>
						</li>

					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				
				<div class="m-content">
					@if(session('statut') == 'admin')
					 @section('m-content')
					 	Welcome admin
					  @show
					@endif
					@if(session('statut') == 'redac')
					 @section('content-giangvien')
						Welcome Giang Vien 
						@show
					@endif
					@if(session('statut') == 'user' )
					 @section('content-sinhvien')
					 	Welcome Sinh Viên
					  @show
					@endif
				</div>

			</div>
		</div>
		<!-- end:: Body -->
		<!-- begin::Footer -->
		<footer class="m-grid__item m-footer ">
			<div class="m-container m-container--fluid m-container--full-height m-page__container">
				<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
					<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
						<span class="m-footer__copyright">
							2018 &copy; Project Manager Student by
							<a href="https://github.com/ducga1998" class="m-link">
								Nguyễn Minh Đức

							</a>
						</span>
					</div>

				</div>
			</div>
		</footer>
		<!-- end::Footer -->
	</div>
	<!-- end:: Page -->
	<!-- begin::Quick Sidebar -->
	
	<!-- end::Quick Sidebar -->
	<!-- begin::Scroll Top -->
	<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
		<i class="la la-arrow-up"></i>
	</div>
	<!-- end::Scroll Top -->
	<!-- begin::Quick Nav -->
	

	@include('common.linkJavascript')

</body>
<!-- end::Body -->

</html>