@extends('front.layout') @section('content-sinhvien')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                       Các Lớp Môn Học Đã Đăng Ký
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-section">
            <div class="m-section__content">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Id Lớp Môn Hoc
                            </th>
                            <th>Tên Môn- Bộ môn</th>
                            <th>
                                Số Lượng Sinh Viên Đã đăng ký vào
                            </th>
                            <th>
                                Setting
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMergen as $item )

                        <tr>

                            <td>
                                {{$item->IdLopMonHoc}}
                            </td>
                            <td>
                                {{$item->TenMonBoMon}}
                            </td>
                            <td>
                                {{$item->CoutSinhvien}}
                            </td>
                            <td>
                                <a idsinhvien="{{$idsinhvien}}" idlopmonhoc="{{$item->IdLopMonHoc}}" class="btn-huyhocphan btn m-btn--pill btn-outline-danger active" href="">Hủy ĐK Lớp Này</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection