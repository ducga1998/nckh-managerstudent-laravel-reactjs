@extends('front.layout') @section('m-content')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        <i class="la la-archive"></i> Quản lý Người Phụ Trách Tải Lên Tài Liệu
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin::Section-->
            <div class="m-section">
                <div class="m-section__content">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Tên Môn
                                </th>
                                <th>
                                    Số Tín Chỉ
                                </th>
                                <th>
                                    Bộ Môn
                                </th>
                                <th>
                                    Người Phụ Trách
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ArrayObject as $ItemMonHoc )
                            <tr>
                                <th>
                                    {{$ItemMonHoc->InfoMon["TenMon"]}}
                                </th>
                                <td>
                                    {{$ItemMonHoc->InfoMon["SoTinChi"]}}
                                </td>
                                <td>
                                    {{$ItemMonHoc->InfoMon["BoMon"]}}
                                </td>
                                <td>
                                    @if ($ItemMonHoc->TenGiangVienPhuTrach=="")
                                         <a idmon="{{$ItemMonHoc->InfoMon["IdMon"]}}" data-toggle="modal" data-target="#bonhiemphutrach" href="#" class="btn-viewbonhiemphutrach btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--pill">
                                        <i class="fa fa-archive"></i>
                                    </a>
                                    @else
                                       <button idmon="{{$ItemMonHoc->InfoMon["IdMon"]}}" data-toggle="modal" data-target="#bonhiemphutrach" href="#" disabled="disabled" class="btn-viewbonhiemphutrach btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--pill">
                                        <i class="fa fa-archive"></i>
                                       </button>
                                      Phụ Trách: {{$ItemMonHoc->TenGiangVienPhuTrach}}
                                    @endif
                                   
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
</div>
<div class="modal fade show" id="bonhiemphutrach" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="layidmonthoi" idmon="">
                    Bổ nhiệm Giảng Viên Phụ Trách
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-section__content">
                    <table class="table table-sm m-table m-table--head-bg-brand">
                        <thead class="thead-inverse">
                             <tr>
                            <th>
                                ID Giảng Viên
                            </th>
                            <th>
                                Tên Giảng Viên
                            </th>
                            <th>
                                Bộ Môn
                            </th>
                            <th>
                                Gmail
                            </th>
                            <th>
                                Bổ nhiệm Phụ Trách
                            </th>
                            </th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($ArrayGiangVien as $ItemGiangVien)
                             <tr>
                                <td>
                                    {{$ItemGiangVien["IdGiangVien"]}} 
                                </td>
                                 <td>
                                    {{$ItemGiangVien["TenGiangVien"]}} 
                                </td>
                                 <td>
                                    {{$ItemGiangVien["BoMon"]}} 
                                </td>
                                 <td>
                                    {{$ItemGiangVien["Gmail"]}} 
                                </td>
                                 <td>
                                  <button idmon="" idgiangvien="{{$ItemGiangVien["IdGiangVien"]}}" type="button" class="BonhiemTaiLieu btn m-btn--pill  btn-outline-brand m-btn m-btn--outline-2x ">
															Bổ Nhiệm Phụ Trách 
															</button>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
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


@endsection