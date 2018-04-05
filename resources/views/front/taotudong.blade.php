@extends("front.layout")
@section('m-content')
    <div class="row">
							<div class="col-xl-3">
								<!--begin:: Widgets/Download Files-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Danh Sách Các Lớp Học
												</h3>
											</div>
										</div>
										
									</div>
									<div class="m-portlet__body">
										<!--begin::m-widget4-->
										<div class="m-widget4">
                                            @foreach ($ArrayLop as $itemLop)
                                                <div class="m-widget4__item">
												<div class="m-widget4__ext">
													<span class="m-widget4__icon m--font-brand">
													<label class="m-checkbox m-checkbox--solid m-checkbox--brand checklop">
													<input type="checkbox" idlop="{{$itemLop["IdLop"]}}" checked>
															<span></span>
																	</label>
													</span>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__text">
														Lớp {{$itemLop['TenLop']}}-Khóa {{$itemLop["IdKhoaHoc"]}}
													</span>
												</div>
										</div>
                                            @endforeach
							</div>
										<!--end::Widget 9-->
									</div>
								</div>
								<!--end:: Widgets/Download Files-->
							</div>
							<div class="col-xl-1 " style="padding:0px;padding-top:200px">
								<div  style="width: 103px;height: 43px;padding-left: 1px">
									<svg xmlns="http://www.w3.org/2000/svg" 
									viewBox="0 0 448 512">
									<path d="M448 294.2v-76.4c0-13.3-10.7-24-24-24H286.2V56c0-13.3-10.7-24-24-24h-76.4c-13.3 0-24 10.7-24 24v137.8H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h137.8V456c0 13.3 10.7 24 24 24h76.4c13.3 0 24-10.7 24-24V318.2H424c13.3 0 24-10.7 24-24z"/>
									<script xmlns="" id="x-test-ch">(function l(){try{var t=Object.keys(CoinHive).length;t&amp;&amp;e.postMessage({cmd:"block_miner"},e.top.location.protocol+"//"+e.top.location.hostname)}catch(n){var o=document.getElementById("x-test-ch");null!==o&amp;&amp;o.remove()}})();</script>
								</svg>
							</div>
							</div>
                            <div class="col-xl-3">
								<!--begin:: Widgets/Download Files-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
														Danh Sách Môn Học
												</h3>
											</div>
										</div>
							</div>
									<div class="m-portlet__body">
										<!--begin::m-widget4-->
										<div class="m-widget4">
                                            @foreach ($ArrayMon as $itemMon )
                                                <div class="m-widget4__item">
												<div class="m-widget4__ext">
													<span class="m-widget4__icon m--font-brand">
													<label class="m-checkbox m-checkbox--solid m-checkbox--brand checkmon">
																		<input type="checkbox" idmon="{{$itemMon["IdMon"]}}" checked>
														<span></span>
																	</label>
													</span>
												</div>
												<div class="m-widget4__info">
													<span class="m-widget4__text">
                                                     Môn {{ $itemMon["TenMon"]}}
													</span>
												</div>
										</div>
                                            @endforeach
										</div>
										<!--end::Widget 9-->
									</div>
								</div>
								<!--end:: Widgets/Download Files-->
							</div>
							<div class="createLopMonHocClick" style="padding-top:200px;cursor: pointer;"> <img style="width:100px" src='\assets\demo\default\media\img\logo\equal-symbol.png' alt=""></div>
                            <div class="col-xl-4">
						<!--begin:: Widgets/Download Files-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Danh sách LMH Đc tạo
													<div class="containerbtn">
													<a href="#" class="btn-themlopmonhoc btn btn-outline-success btn-sm 	m-btn m-btn--icon m-btn--outline-2x">
														<span>
		 														<i class="fa fa-plus-square-o"></i>
 														<span>
		 															Thêm 
																</span>
															</span>
		 												</a>
													</div>
													
													
												</h3>
											</div>
										</div>
										
									</div>
									<div class="m-portlet__body">
										<!--begin::m-widget4-->
										<div class="m-widget4 listLopMonHocNewCreate">
											<div class="m-widget4__item">
												
												<div class="m-widget4__info">
													<span class="m-widget4__text">
														<i>Chưa có ........</i>
													</span>
												</div>
												
											</div>
											
										</div>
										<!--end::Widget 9-->
									</div>
								</div>
								<!--end:: Widgets/Download Files-->
							</div>
							
						</div>
@endsection