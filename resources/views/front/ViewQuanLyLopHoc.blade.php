@extends('front.layout')
@section('m-content')
    <div class="m-portlet  m-viewdiglog">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Thêm Lớp Học
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
						<form id="FormSubmitLopHoc"  class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
							{!! csrf_field() !!}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<label class="col-lg-1 col-form-label">
										Tên Lớp
									</label>
									<div class="col-lg-3">
										<input name="tenlop" class="form-control m-input" placeholder="Nhập tên Lớp">
										<span class="m-form__help">
											Nhập tên lớp
										</span>
									</div>
									
									<label class="col-lg-1 col-form-label">
										Chọn Khóa Học
									</label>
									<div class="col-lg-3">
										<select name="khoahoc" class="form-control m-input m-input--square" id="selectKhoaHoc">
											@foreach ($ArrayKhoa as $item )
                                                <option idkhoahoc="{{$item['IdKhoaHoc']}}">
                                                    {{$item["TenKhoaHoc"]}}
                                                </option>
                                            @endforeach
										</select>
									</div>
										


								</div>


							</div>
							<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
								<div class="m-form__actions m-form__actions--solid">
									<div class="row">
										<div class="col-lg-5"></div>
										<div class="col-lg-7">
											<button type="submit"  class="btn btn-brand ">
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
						<div class="notice-sucess"></div>
						<!--end::Form-->
                    </div>
                    {{--end s phần thêm lớp môn học --}}
<div class="m-portlet m-portlet--mobile ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                   Danh Sách Lớp Học
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover"
                        aria-expanded="true">
                        <a href="#" class="viewAddGiangVien m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="fa fa-plus"></i>
                        </a>
                        
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="m_datatable m-datatable m-datatable--default m-datatable--scroll m-datatable--loaded" id="m_datatable_latest_orders"
        style="">
        <table class="m-datatable__table" id="m-datatable--1018619778392" style="display: block; max-height: 380px;">
            <thead class="m-datatable__head">
                <tr class="m-datatable__row" style="height: 56px; left: 0px;">
                    

                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc">
                        <span style="width: 100px;">Id Lớp 
                            <i class="la la-arrow-up"></i>
                        </span>
                    </th>
                    <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Tên Lớp</span>
                    </th>
                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Khóa</span>
                    </th>
                     <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Số Lượng Sinh Viên trong Lớp</span>
                    </th>
                    <th>
                        
                    </th>
                    
                  
                   


                </tr>
            </thead>
            <tbody class="m-datatable__body mCustomScrollbar _mCS_8 mCS-autoHide" style="max-height: 324px; height: 324px; position: relative; overflow: visible;"
                data-scrollbar-shown="true">
                @foreach ($ArrayLop as $item )
                <tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 55px;">
                    
                    {{-- Id IdGiangVien TenGiangVien BoMon Gmail updated_at created_at password --}}

                    <td data-field="ShipDate" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["IdLop"]}}</span>
                    </td>
                    <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                        <span style="width: 100px;">{{$item["TenLop"]}}</span>
                    </td>
                    <td data-field="ShipName" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["IdKhoaHoc"]}}</span>
                    </td>
                      <td data-field="ShipName" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["IdKhoaHoc"]}}</span>
                    </td>
                    


                   
                    
                </tr>

                @endforeach {{-- end row --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

