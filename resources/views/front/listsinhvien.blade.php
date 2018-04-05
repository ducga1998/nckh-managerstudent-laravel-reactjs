@extends('front.layout',['NameAdmin' =>"csacsacsa",'GmailAdmin'=>"csacascsacsa"]) @section('m-content')
<div class="row m-row--no-padding m-row--col-separator-xl" style="margin-bottom:10px">
    <select urlLop="{{url('listlophoc')}}" urlKhoa="{{url('listkhoahoc')}}" class="form-control m-input m-input--air col-xl-4"
        id="selectcategory">
        <option flag="khoahoc">
            Theo Khóa Học
        </option>
        <option flag="lophoc">
            Theo Lớp Học
        </option>

    </select>

    <div class="containerAjaxContent col-xl-4"></div>

    <button routetheokhoa="{{url('/listsinhvientheokhoa')}}" routetheolop="{{url('/listsinhvientheolophoc')}}" type="button"
        class=" filter-btn btn btn-primary btn-sm m-btn m-btn--custom col-xl-2" id="m_blockui_1_5">
        Filter
    </button>

</div>
<div class="m-portlet m-portlet--mobile ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Danh sách Sinh Viên Lớp
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--open" data-dropdown-toggle="hover" aria-expanded="true">
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
                    <span style="width: 100px;">
                        <label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </span>
                </th>
                {{-- "Id" => 22 "IdSinhVien" => 1 "TenSv" => "NGuyen minhduc" "IdLop" => 1 "GioiTinh" => 1 "IdLopMonHoc" => null "IdKhoaHoc"
                => 57 "NgaySinh" => "2018-03-20 16:37:51" --}}
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
        <tbody id="containerHTMLListSinhVien" class="m-datatable__body mCustomScrollbar _mCS_8 mCS-autoHide" style="max-height: 324px; height: 324px; position: relative; overflow: visible;"
            data-scrollbar-shown="false">
        <div id="m_blockui_1_content">
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

                <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                    <span style="width: 100px;">{{$item["IdSinhVien"]}}</span>
                </td>
                <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                    <span style="width: 100px;">{{$item["TenSv"]}}</span>
                </td>
                <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                    <span style="width: 100px;">
                        @foreach($useArrayLopHoc as $itemLop) @if($itemLop["IdLop"]==$item["IdLop"]) {{$itemLop["TenLop"]}} @endif @endforeach
                    </span>
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
                    <span style="overflow: visible; width: 100px;">
                        
                        <a idsinhvien="{{$item["IdSinhVien"]}}" href="#" data-toggle="modal" data-target="#modalupdate"  class="btn-edit-sinhvien m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill deletegv" title="Delete">
                            <i class="la la-trash"></i>
                        </a>
                    </span>
                </td>
            </tr>

            @endforeach
        </div>
</div>
        </tbody>
    </table>
    @endif
</div>
</div>
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
    </div>
    <!--begin::Form-->
    <form method="POST" id="FormThemSinhVien" routethemsinhvien="{{url('themsinhvienajax')}}" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
       <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-lg-1 col-form-label">
                    ID Sinh Viên
                </label>
                <div class="col-lg-3">
                    <input type="number" name="idsinhvien" class="form-control m-input" placeholder="ID Sinh viên">
                    <span class="m-form__help">
                        ID Sinh viên
                    </span>
                </div>
                <label class="col-lg-1 col-form-label">
                    Tên Đầy đủ
                </label>
                <div class="col-lg-3">

                    <input name="tensinhvien" class="form-control m-input" placeholder="Full name">
                    <span class="m-form__help">
                        Nhập tên Sinh Viên
                    </span>
                </div>
                {{-- end --}}


                <label class="col-lg-1 col-form-label">
                    Password
                </label>
                <div class="col-lg-3">

                    <input name="password" class="form-control m-input" placeholder="PassWord" type="password">
                    <span class="m-form__help">
                        Nhập tên password
                    </span>
                </div>
                {{-- end --}}
                <label class="col-lg-1 col-form-label">
                    Lớp Học
                </label>
                <div class="col-lg-3">

                    <select name="lophoc" class="form-control m-input" id="selectLopHoc">
                       @foreach ($useArrayLopHoc as $item )
                           <option  value="{{$item["IdLop"].' '. $item["IdKhoaHoc"]}}" >
                                {{$item["TenLop"]}} {{$item["IdKhoaHoc"]}}
                           </option>
                       @endforeach
                    </select>

                </div>
                {{-- end --}}
                <label class="col-lg-1 col-form-label">
                   Giới Tinh
                </label>
                <div class="col-lg-3">
                   
                <label class="m-radio m-radio--bold m-radio--state-brand">
                    <input type="radio" name="gioitinh" value="1">Nam
                    <span></span>
                </label>
                <label class="m-radio m-radio--bold m-radio--state-brand">
                    <input type="radio" name="gioitinh" value="0"> Nữ
                    <span></span>
                </label>
                </div>



            </div>


        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-brand SubmitAddSinhVien">
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

    {{-- code modal update !!!!!!! --}}
    <div class="modal fade show" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Update Info
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										<form id="FormUpdateInfoSinhVien" method="POST">
											<div class="form-group m-form__group">
												<label for="exampleInputEmail1">
												Id Sinh Viên
												</label>
												<input name="idsinhvien" class="form-control m-input" aria-describedby="emailHelp" disabled placeholder="Id Sinh Viên....">
												<span class="m-form__help">
													Id của sinh viên
												</span>
                                            </div>
                                           
											<div class="form-group m-form__group">
												<label for="exampleInputEmail1">
													Tên Sinh Viên
												</label>
												<input value="" id="tensvupdate" name="tensinhvien" class="form-control m-input"   placeholder="Tên Sinh Viên....">
												<span class="m-form__help">
													Nhập Tên Sinh Viên
												</span>
                                            </div>

                                            <div class="form-group m-form__group">
												<label for="exampleInputEmail1">
													Khóa Học
												</label>
												<input value="" name="khoahoc" class="form-control m-input"   placeholder="Khóa học .....">
												<span class="m-form__help">
													Khóa học
												</span>
                                            </div>


                                       

                                            <div class="form-group m-form__group">
												 <div class="input-group date" id="m_datetimepicker_3">
												<input  name="ngaysinh" type="text" class="form-control m-input" readonly="" value="1899-11-29 00:30">
												<span class="input-group-addon">
													<i class="la la-calendar glyphicon-th"></i>
												</span>
											</div>
											<span class="m-form__help">
												Ngày Sinh của sinh viên
											</span>
                                            </div>
                                            <button type="reset" class="btn btn-primary" >Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary" >
											Lưu
                                        </button>
										</form>
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