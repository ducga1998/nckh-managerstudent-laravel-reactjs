<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Metronic | Login Page - 1
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
	@include("common/linkCSS")
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		@include("common/loading")
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="#" class="clickDao">
										{{-- <img src="{{asset('assets/app/media/img//logos/logo-2.png')}}"> --}}
										<img style="width:150px;height:150px;border-radius:3px" src="https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-9/22310508_1809195862705796_5608380704887954408_n.jpg?_nc_cat=0&_nc_eui2=v1%3AAeHU-7EWaslL23eJjrLhUZ0bn2UCt3JTZxoTATaNnySocpudiNhs0dmEBsTCWTsqjh5CdD9xwa-416pqvZYSHrUl0JwMVN8LKHT1LtlQxtEouw&oh=050ee0732791b29a4d5a0a752020a2ed&oe=5B28159B" alt="">
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Sign In To Student UTC
										</h3>
									</div>
                                    {{-- begi form login has student --}}
                  
                {{--  end Form  --}}
									<form id="formSubmit" class="m-login__form m-form" action="{{ url('/auth/login') }}" method="POST">
									{!! csrf_field() !!}
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="Email" name="log" autocomplete="off">
										</div>
										<div>
										
										
											 {{ $errors->first('idsv') }}
        									 {{ $errors->first('password') }}
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" name="memory">
													Remember me
													<span></span>
												</label>
											</div>
											
										</div>
										<div class="m-login__form-action">
											<input type="submit" value="SignIn"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air"
											onclick="event.preventDefault();
                                                     document.getElementById('formSubmit').submit();">
												
										
										</div>
									</form>
								</div>
							
								
							</div>
						</div>
					
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url({{asset('assets/app/media/img//bg/bg-4.jpg')}}">
					<div class="m-grid__item m-grid__item--middle">
						<h3 class="m-login__welcome">
						Tony Robbins
						</h3>
						<p class="m-login__msg">
							“The secret of success is learning how to use pain and pleasure instead of having pain and pleasure use you. If you do that, you’re in control of your life. If you don’t, life controls you.”
							<br>
						
						</p>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		function noneLoading(){
			
			$(".full-page-absolute").addClass("None");
	}
	
	setTimeout(()=>{
		$(".full-page-absolute").addClass("opacity");
		setTimeout(() => {
			noneLoading()
		}, 500);
	}, 1500);
</script>
		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
        <script src="{{asset('assets/snippets/pages/user/login.js')}}" type="text/javascript"></script>
        

        
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
