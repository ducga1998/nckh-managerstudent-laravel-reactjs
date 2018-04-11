@extends('front.layout') @section('content-sinhvien')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    @if ($dataMergen!=null)
                        
                   
                     @if($dataMergen[0]->deadine_dangky)
            <h3 class="m-portlet__head-text">
                       Các Lớp Môn Học Đã Đăng Ký
                    </h3>
                     @else
            <h3 class="m-portlet__head-text">
                      Đã Hết hạn Đăng ký và Phần bài tập để xem bài tập 
                    </h3>
                     @endif
                      @else
                        <h3 class="m-portlet__head-text">
                            Chưa có lớp môn học nào để đăng ký 
                     </h3>
                      @endif
                    
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
                                @if($item->deadine_dangky)
                                      <a idsinhvien="{{$idsinhvien}}" idlopmonhoc="{{$item->IdLopMonHoc}}" class="btn-huyhocphan btn m-btn--pill btn-outline-danger active" href="">Hủy ĐK Lớp Này</a> 
                                @else
                                   <button type="button" class="btn m-btn--pill    btn-success m-btn m-btn--custom" disabled="disabled">
						Đã Bắt Đầu Học
					</button>
                                @endif
                             
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