@extends('front.layout') @section('content-sinhvien')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Các Lớp Môn Học Có thể Đăng ký Được
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
                                Đăng ký Học
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- +idmon: 2 +IdLopMonHoc: "N0-1-2-NKCA" +TenMonBoMon: "TRIET-HamLoz" +CoutSinhvien: 1 +Listsinhvien: array:1 +checkDkMonHoc:
                        false --}} @foreach ($dataMergen as $item ) @if($item->CheckDkMonHoc==1)
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
                            <td is="{{$item->deadine_dangky}}">
                                
                                @if($item->deadine_dangky==1)
                                    <a class="BtnDkLopMonHocChoSinhVien btn m-btn--pill m-btn--air btn-outline-brand"  link="{{url('sinhviendangkylopmonhoc/'.$item->IdLopMonHoc.'')}}">Đăng ký</a>  
                                @else
                                  <a  class="btn m-btn--pill   btn-secondary m-btn m-btn--custom m-btn--label-metal" disabled="disabled"> Đã Hết hạn đăng ký</a>  
                                  @endif
                           



                            </td>
                        </tr>
                        @endif @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection