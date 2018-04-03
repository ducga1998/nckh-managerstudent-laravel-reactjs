@extends('front.layout',['NameAdmin' =>"csacsacsa",'GmailAdmin'=>"csacascsacsa"])
@section('m-content')
    <div class="m-portlet m-portlet--mobile ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Danh sách Sinh Viên Lớp {{$TenLop}}
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
         @if(count($list)<1)
                    <div style="font-size: 30px;text-align: center; color: #b3b1b1;"> Lớp Chưa có Sinh Viên nào
                        <button type="button" class="btn m-btn--pill m-btn--air btn-outline-success btn-addStudent">
									Thêm Sinh Viên
								</button>
                    </div>
                    
                @else
        <table class="m-datatable__table" id="m-datatable--1018619778392" style="display: block; max-height: 380px;">
            <thead class="m-datatable__head">
                <tr class="m-datatable__row" style="height: 56px; left: 0px;">
                    <th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                        <span style="width: 40px;">
                            <label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox">
                                <span></span>
                            </label>
                        </span>
                    </th>
                    {{-- "Id" => 22
    "IdSinhVien" => 1
    "TenSv" => "NGuyen minhduc"
    "IdLop" => 1
    "GioiTinh" => 1
    "IdLopMonHoc" => null
    "IdKhoaHoc" => 57
    "NgaySinh" => "2018-03-20 16:37:51" --}}
                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc">
                        <span style="width: 100px;">Id Sinh Viên
                           
                        </span>
                    </th>
                     <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Tên Sinh Viên</span>
                    </th>
                    <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Tên Lớp</span>
                    </th>
                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Giới Tính </span>
                    </th>
                    <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Khóa học</span>
                    </th>
                      <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Ngày Sinh</span>
                    </th>
                     <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                        <span style="width: 100px;">Setting</span>
                    </th>

                   


                </tr>
            </thead>
            <tbody class="m-datatable__body mCustomScrollbar _mCS_8 mCS-autoHide" style="max-height: 324px; height: 324px; position: relative; overflow: visible;"
                data-scrollbar-shown="true">
               
                @foreach ($list as $item )
                <tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 55px;">
                    <td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                        <span style="width: 40px;">
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" value="1">
                                <span></span>
                            </label>
                        </span>
                    </td>
                    {{-- Id IdGiangVien TenGiangVien BoMon Gmail updated_at created_at password --}}

                     <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                        <span style="width: 100px;">{{$item["IdSinhVien"]}}</span>
                    </td>
                     <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                        <span style="width: 100px;">{{$item["TenSv"]}}</span>
                    </td>
                    <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                        <span style="width: 100px;">{{$TenLop}}</span>
                    </td>
                        <td data-field="ShipDate" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["GioiTinh"]?"Nam":"Nữ"}}</span>
                    </td>
                    <td data-field="ShipName" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["IdKhoaHoc"]}}</span>
                    </td>
                 <td data-field="ShipName" class="m-datatable__cell">
                        <span style="width: 100px;">{{$item["NgaySinh"]}}</span>
                    </td>


                   
                   
                    <td data-field="Actions" class="m-datatable__cell">
                        <span style="overflow: visible; width: 110px;">
                            <div class="dropdown ">
                                <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                    <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="la la-edit"></i> Edit Details</a>
                                    <a class="dropdown-item" href="#">
                                        <i class="la la-leaf"></i> Update Status</a>
                                    <a class="dropdown-item" href="#">
                                        <i class="la la-print"></i> Generate Report</a>
                                </div>
                            </div>
                            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill deletegv"
                                title="Delete">
                                <i class="la la-trash"></i>
                            </a>
                        </span>
                    </td>
                </tr>

                @endforeach 
             
            </tbody>
        </table>
           @endif
    </div>
</div>
div class="m-portlet  m-viewdiglog">
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
						<form  id="FormThemSinhVien" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
							{!! csrf_field() !!}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
                                    <label class="col-lg-1 col-form-label">
										ID Sinh Viên
									</label>
									<div class="col-lg-3">
										<input name="name" class="form-control m-input" placeholder="ID Sinh viên">
										<span class="m-form__help">
											ID Sinh viên
										</span>
									</div>
									<label class="col-lg-1 col-form-label">
									Tên Đầy đủ
									</label>
									<div class="col-lg-3">
										<input name="name" class="form-control m-input" placeholder="Full name">
										<span class="m-form__help">
											Nhập tên Sinh Viên
										</span>
									</div>
									<label class="col-lg-1 col-form-label">
										Email (Nếu có):
									</label>
									<div class="col-lg-3">
										<input name="email" type="email" class="form-control m-input" placeholder="Email">
										<span class="m-form__help">
											Email
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
@endsection