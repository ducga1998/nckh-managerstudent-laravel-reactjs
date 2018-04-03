@extends('front.layout',['NameAdmin' =>"csacsacsa",'GmailAdmin'=>"csacascsacsa"])
@section('m-content') {{-- Id IdGiangVien TenGiangVien BoMon Gmail updated_at created_at password --}}
<div id="content-ajax"></div>
<div class="m-portlet  m-viewdiglog">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Thêm Giảng Viên
									</h3>
								</div>
							</div>
						</div>
						<!--begin::Form-->
						<form  routeThemGiangVien="{{url('themgiangvien')}}" id="FormAddGiangVien" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
							{!! csrf_field() !!}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<label class="col-lg-1 col-form-label">
										Full Name:
									</label>
									<div class="col-lg-3">
										<input name="name" class="form-control m-input" placeholder="Full name">
										<span class="m-form__help">
											Nhập tên Giảng Viên
										</span>
									</div>
									<label class="col-lg-1 col-form-label">
										Email Của Giảng Viên:
									</label>
									<div class="col-lg-3">
										<input name="email" type="email" class="form-control m-input" placeholder="Email">
										<span class="m-form__help">
											Nhập Gmail của Giảng viên
										</span>
									</div>
									<label class="col-lg-1 col-form-label">
										Bộ Môn
									</label>
									<div class="col-lg-3">
										<select name="bomon" class="form-control m-input m-input--square" id="exampleSelect1">
											<option value="KHMT">
												KHMT
											</option>
											<option value="CNPM">
												CNPM
											</option>
											<option value="MANG">
												MANG
											</option>
											<option value="HTTT">
												HTTT
											</option>
											<option value="TRIET">
												Triết học
											</option>
										</select>
									</div>
										<label class="col-lg-1 col-form-label">
									password
									</label>
									<div class="col-lg-3">
										<input name="password" type ="password"class="form-control m-input" placeholder="Password">
										<span class="m-form__help">
											Nhập Password
										</span>
									</div>


								</div>


							</div>
							<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
								<div class="m-form__actions m-form__actions--solid">
									<div class="row">
										<div class="col-lg-5"></div>
										<div class="col-lg-7">
											<button type="submit"  class="btn btn-brand SubmitAddSinhVien">
												Submit
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
                    Danh sách Giảng Viên
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover"
                        aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-ellipsis-h m--font-brand"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first">
                                                <span class="m-nav__section-text">
                                                    Quick Actions
                                                </span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="m-nav__link viewAddGiangVien" >
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">
                                                        Create Post
                                                    </span>
                                                </a>
                                            </li>





                                            <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                            <li class="m-nav__item m--hide">
                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                    Submit
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                        <span style="width: 100px;">
                            <label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                        </span>
                    </th>

                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc">
                        <span style="width: 100px;">Tên Giảng Viên
                            <i class="la la-arrow-up"></i>
                        </span>
                    </th>
                    <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Id Giảng Viên</span>
                    </th>
                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Ngày tạo tài khoản</span>
                    </th>
                    <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Gmail</span>
                    </th>
                    <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">BỘ Môn</span>
                    </th>
                    <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Status</span>
                    </th>


                </tr>
            </thead>
            <tbody class="m-datatable__body mCustomScrollbar _mCS_8 mCS-autoHide" style="max-height: 324px; height: 324px; position: relative; overflow: visible;"
                data-scrollbar-shown="true">
                @foreach ($list as $item )
                <tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 55px;">
                    <td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                        <span style="width: 100px;">
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" value="1">
                                <span></span>
                            </label>
                        </span>
                    </td>
                    {{-- Id IdGiangVien TenGiangVien BoMon Gmail updated_at created_at password --}}

                    <td data-field="ShipDate" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["TenGiangVien"]}}</span>
                    </td>
                    <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                        <span style="width: 100px;">{{$item["IdGiangVien"]}}</span>
                    </td>
                    <td data-field="ShipName" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["updated_at"]}}</span>
                    </td>


                    <td data-field="Type" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["Gmail"]}}</span>

                    </td>
                    <td data-field="Status" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["BoMon"]}}</span>

                    </td>
                    <td data-field="Actions" class="m-datatable__cell">
                        <span style="overflow: visible; width: 100px;">
                            
                            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                            <a IdGiangVien="{{$item["IdGiangVien"]}}" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill deletegv"
                                title="Delete">
                                <i class="la la-trash"></i>
                            </a>
                        </span>
                    </td>
                </tr>

                @endforeach {{-- end row --}}
            </tbody>
        </table>
    </div>
</div>
<button type="button" class="ajaxSucess" style="width:0px" data-toggle="modal" data-target="#m_modal_1">

</button>
<div class="modal fade show" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                   Thông Báo
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
              Xóa Thành Công Giảng Viên 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Đóng 
                </button>
               
            </div>
        </div>
    </div>
</div>
{{-- end model m_modal_1 --}} @endsection