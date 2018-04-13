@extends('front.layout') @section('content-giangvien')
<div class="m-portlet">
    <div class="m-portlet__body">
        <h3 class="m-section__heading">
Thêm Lớp Môn Học(Bấm Save để lưu lại....)
							</h3>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <div class="m-section">
                    <div class="m-section__content">

                        <input class="form-control m-input" type="text" placeholder="Nhập Tiêu đề. vd. chương 1....." id="NoiDung">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="m-section">
                    <div class="m-section__content">

                        <input class="form-control m-input" type="text" placeholder="Nhập Số tiết ....." id="sotiet">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">

        <button type="button" class="btn-themnoidung btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">
            Thêm Nội Dụng
        </button>


        <button idmon="{{$idmonhoc}}" type="button" class="btn m-btn--pill m-btn--air      btn-saveNoiDung   btn-primary">
            Save
        </button>

    </div>
</div>
    </div>

</div>
<br>
<div linkChitietNoiDung="{{url('ChiTietNoiDungMonHoc')}}" class="TitleContent"></div>
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-section">
            <h3 class="m-section__heading">
										Các Nội Dung Của Môn Học(click vào để xem chi tiết ...)
											</h3>
            <div class="m-section__content">
                <!--begin::Preview-->
                <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                    <div class="m-demo__preview">
                        <div class="m-list-timeline">
                        <div class="m-list-timeline__items containerContent">
                             @foreach ($ArrayNoiDung as $item )
                                 <div class="m-list-timeline__item">
                        <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                        <span idnoidung="{{$item["Id"]}}" class="m-list-timeline__text clickViewChiTiet">
                          {{$item['TieuDe']}}
                        </span>
                        <span class="m-list-timeline__time">
                           Số tiết:{{$item['SoTiet']}}
                        </span>
                    </div>
                             @endforeach
                                </div>
                            
                        </div>
                    </div>
                </div>
                <!--end::Preview-->

            </div>
        </div>
    </div>
</div>
{{-- area modal --}}
<button data-toggle="modal" data-target="#ViewChiTietNoiDung" style="width:0px;height:0px;padding:0px" type="button" class="btn btn-warning btn-ModalNoiDungChiTiet" ></button>
<div class="modal fade show" id="ViewChiTietNoiDung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title TitleContent">
                                                Loading....
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body" style="background-color: white;">
										<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <div class="m-section">
                    <div class="m-section__content">

                       <div class="summernote"> </div>;
                         <input class="form-control m-input" type="text" placeholder="link Video ..." id="linkvideo">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
               <button  type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">
            Thêm Chi Tiết Nội Dung
        </button>
         <button  idnoidung=""   type="button" class="btn-SaveChiTietNoiDung btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-success m-btn--gradient-to-accent">
          Save
            </div>
        </div>
    </div>
   


</div>
<br>

<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-section">
            <h3 class="m-section__heading ">

                                        Nội Dung Chi Tiết Của:<span class="TitleContent" >Loading....</span> 	
											</h3>
            <div class="m-section__content">
                <!--begin::Preview-->
                <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                    <div class="m-demo__preview">
                        <div class="m-list-timeline">
                            <div class="m-list-timeline__items LoadingChiTietNoiDung">
                                Loading.....
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Preview-->

            </div>
        </div>
    </div>
</div>
									</div>
									<div class="modal-footer"  style="background-color: white;">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
								</div>
							</div>
						</div>




@endsection