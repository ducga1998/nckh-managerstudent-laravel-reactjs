@extends("front.layout") @section('m-content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
              Tạo Lớp Môn Học Bằng Tay
            </h3>
           
        </div>
       
    </div>
    {{-- header content --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Form nhập
												</h3>
											</div>
										</div>
                                    </div>
                                    <form  action="" id="formtaolopmonhoc" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                        <div class="m-portlet__body">
                                             <div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
													Id Lớp Môn Hoc
													</label>
													<input type="text" name="idlophoc"  class="form-control m-input" placeholder="Nhập id môn ....">
													<span class="m-form__help">
                                                        Cú pháp theo N__ Vd:N01
													</span>
												</div>
												<div class="col-lg-6">
													<label class="">
														Chọn Môn cho lớp học
													</label>
													<select name="monhoc" class="form-control m-input m-input--square" id="selectmon">
												@foreach ($ArrayMonHoc as $item)
                                                    <option IdMon="{{$item["IdMon"]}}">
                                                        {{$item["TenMon"]}}
                                                    </option>
                                                @endforeach
											</select>
													<span class="m-form__help">
													Tất cả các môn ở trong select. Bạn có thể chọn bất kì
													</span>
												</div>
											</div>
                                        </div>
                                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-6">
														<button type="submit" class="btn btn-primary">
                                                            Thêm Lớp
														</button>
														<button type="reset" class="btn btn-secondary">
															Cancel
														</button>
													</div>
													
												</div>
											</div>
										</div>
                                    </form>
            </div>
        </div>
    </div>
   

</div>
@endsection