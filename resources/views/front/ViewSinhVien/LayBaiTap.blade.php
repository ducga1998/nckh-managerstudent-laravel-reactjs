@extends('front.layout') @section('content-sinhvien')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">

                    <h3 class="m-portlet__head-text">
                        Các Lớp Đang Học
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
                                Setting
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                         @if($dataMergen!=null)
                        @if($dataMergen[0]->deadine_dangky!=1)
                            
                     
                        @foreach ($dataMergen as $item )

                        <tr>

                            <td>
                                {{$item->IdLopMonHoc}}
                            </td>
                            <td>
                                {{$item->TenMonBoMon}}
                            </td>

                            <td>
                                <button data-toggle="modal" data-target="#laybaitap" link="{{url('ListLinkBaiTap/'.$item->IdLopMonHoc.'')}}" type="button"
                                    class="btn m-btn--pill btn-primary active m-btn m-btn--custom laylinkbaitap">
                                    Lấy Bài Tập
                                </button>
                                

                            </td>

                        </tr>
                        @endforeach
                           @else
                          <h3 class="m--font-info"> Vẫn còn thời gian đăng ký ,Chưa vào học chính thức xin hãy đăng ký lớp môn học </h2>
                           @endif
                           @else
                             <h3 class="m--font-info"> Chưa đăng ký lớp học nào hoặc chưa có lớp để đăng ký.... please wait.... </h2>
                           @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="laybaitap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                   Danh sách Link bài tập giảng viên đã giao cho lớp
                    <div class="m-loader m-loader--brand loaderdisplay" style="width: 30px; display:none;"></div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Id Lớp Môn Hoc
                            </th>
                            <th>Tên Môn- Bộ môn</th>
                            <th>
                                Tên giảng viên
                            </th>

                            <th>
                                Link Bài tập
                            </th>

                            <th>
                                Nộp Bài
                            </th>
                        </tr>
                    </thead>
                    <tbody class="containerLinkBaiTap">
                        <tr>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ClearHTMl" data-dismiss="modal">
                    Close
                </button>

            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-danger btn-nopbai" style="width:0px;height:0px;opacity:0" data-toggle="modal" data-target="#m_modal_5">
    Launch Modal
</button>
<div class="modal fade show" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-right: 17px;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                   Form Nộp Bài
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formnhapbaitap" idlopmonhoc="" idsinhvien="{{$infosinhvien["IdSinhVien"]}}">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">
                            Link bài nộp:
                        </label>
                        <input type="text" class="form-control" id="linkbainop">
                    </div>
                    <div class="form-group">
                        <button  type="submit" class="btn m-btn--pill    btn-outline-info active">
                            Nộp
                        </button>
                    </div>
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