@extends('front.layout')
@section('content-sinhvien')

<div class="m-portlet">
    
    <div class="row">

        @foreach ($Course as $item)

        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> Môn:{{$item->TenMonHoc}}

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Tác Giả: <b>{{$item->TenGiangVien}}</b> </li>
                    <li class="list-group-item"> Time Start:<b> {{$item->infoKhoHoc['time_start']}}</b></li>
                    <li class="list-group-item"> Time End:<b>{{$item->infoKhoHoc['time_end']}}</b> </li>
                   
                </ul>
                <div class="card-body">
                    @if( strtotime($item->infoKhoHoc['time_start'])>time())
                    @if ($item->check==0)
                           <button href="#" disabled="disabled"   
                           class=" btn-dkkhoahoc btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
                           Đã Đăng ký</button>
                    @else
                     <a idkhoahoc="{{$item->infoKhoHoc['Id']}}"
                         tengiangvien="{{$item->TenGiangVien}}" tenmon="{{$item->TenMonHoc}}" 
                         href="#"  data-toggle="modal" data-target="#chitietkhoahoc"
                          class=" btn-dkkhoahoc btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
                        Chi Tiết
                    </a>
                    @endif
                   
@else
 <button disabled="disabled" href="#" class="  btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">Hết Hạn Đăng Ký</button>
@endif
                </div>
            </div>
        </div> 
        @endforeach

    </div>
</div>


<div class="modal fade show" id="chitietkhoahoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" >
										Chi Tiết Khóa Học
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="card bg-dark text-white">
 <img class="card-img"
  data-src="http://unitop.vn/public/images/banner.png" alt="100%x270" style="height: 270px; width: 100%; display: block;" src="http://unitop.vn/public/images/banner.png" data-holder-rendered="true"> 
  <div class="card-img-overlay">
   Môn Học: <h5 class="card-title tenkhoahoc"></h5>
    Tác giả:<p class="card-text tentacgia"></p>
    <p class="card-text">
        
    </p>
    
   <button idsinhvien="{{$IdSinhVien}}"  type="button" class="btn-dkonline btn m-btn--pill    btn-primary">
ĐĂNG KÝ														</button>
</div>

                                    </div>
                                   
  </div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
								</div>
							</div>
						</div>
@endsection