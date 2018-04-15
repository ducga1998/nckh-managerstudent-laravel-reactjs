@extends('front.layout')
@section('content-giangvien')
<div class="m-portlet  m-viewdiglog">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Thêm Sinh Viên


                </h3>
            </div>

        </div>
        <div class="m-portlet__head-tools">
            <a href="#" class="btn displayNone btn-outline-danger m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
								<i class="fa fa-close"></i>
						</a>
           
</div>
    </div>
    <!--begin::Form-->
    <form tengiangvien="{{$TenGiangVien}}" id="FormThemKhoaHoc" routethemsinhvien="{{url('themsinhvienajax')}}" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
       <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-lg-1 col-form-label">
                  Tên Khóa Học
                </label>
                <div class="col-lg-3">
                    <input  name="tenkhoahoc" class="form-control m-input" placeholder="Tên Khóa Học... ">
                    <span class="m-form__help">
                       Tên Khóa Học
                    </span>
                </div>
                


                <label class="col-lg-1 col-form-label">
                   Thời gian bắt đầu
                </label>
                <div class="col-lg-3">

                    <input name="timestart"id="m_datepicker_1"  class="form-control m-input" placeholder="Thời Gian Bắt Đầu...." >
                    <span class="m-form__help">
                        Chọn Thời gian Bắt đầu
                    </span>
                </div>
                <label class="col-lg-1 col-form-label">
                  Chọn Môn:
                </label>
                <div class="col-lg-3">

                 <select class="form-control m-input m-input--air" id="selectmonhoc">
												@foreach ($ArrayMon as $itemMon)
                                                   <option value=" {{$itemMon["IdMon"]}}">
                                                       {{$itemMon["TenMon"]}}
                                                       </option> 
                                                @endforeach
											</select>
                    <span class="m-form__help">
                        Chọn Môn Phù Hợp Với Khóa Học
                    </span>
                </div>
                {{-- end --}}
<label class="col-lg-1 col-form-label">
                   Thời gian Kết Thức
                </label>
                <div class="col-lg-3">

                    <input name="timeend" id="m_datepicker_1"  class="form-control m-input" placeholder="Thời gian Kết Thúc ..." >
                    <span class="m-form__help">
                        Chọn Thời gian Kết Thúc
                    </span>
                </div>
                {{-- end --}}

            </div>


        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-brand">
                            Thêm 
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!--end::Form-->
</div>
<div class="m-portlet">
    <a href="#" class="viewAddGiangVien m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="fa fa-plus"></i>
                        </a>
							<div class="m-portlet__body m-portlet__body--no-padding">
								<div class="containerCourse row m-row--no-padding m-row--col-separator-xl">
                                    @foreach ( $Course as $item)
                                         <div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                               {{$item}}
                                            </div>
                                            <div class="author">
                                                Thầy thông
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															Info
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
                                    </div>
                                    @endforeach
                                   
                                    <div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                                Tên Tác Giả
                                            </div>
                                            <div class="author">
                                                Thầy thông
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															Info
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                                Tên Tác Giả
                                            </div>
                                            <div class="author">
                                                Thầy thông
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															Info
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                                Tên Tác Giả
                                            </div>
                                            <div class="author">
                                                Thầy thông
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															Info
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
									</div>
									<div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                                Tên Tác Giả
                                            </div>
                                            <div class="author">
                                                Thầy thông
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															Info
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
									</div><div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                                Tên Tác Giả
                                            </div>
                                            <div class="author">
                                                Thầy thông
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															Info
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
									</div>
									
								</div>
							</div>
						</div>
@endsection