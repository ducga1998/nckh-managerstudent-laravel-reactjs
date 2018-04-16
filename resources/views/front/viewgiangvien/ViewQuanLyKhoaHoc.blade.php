@extends('front.layout') @section('content-giangvien')
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
        <div class="m-portlet__head-tools">
            <a href="#" class="btn displayNone btn-outline-danger m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                <i class="fa fa-close"></i>
            </a>

        </div>
    </div>
    <!--begin::Form-->
    <form id="FormThemKhoaHoc" routethemsinhvien="{{url('themsinhvienajax')}}" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-lg-1 col-form-label">
                    Giảng viên Tạo Khóa Học:
                </label>
                <div class="col-lg-3">
                    <input disabled="disabled" name="tenkhoahoc" class="form-control m-input" placeholder="{{$TenGiangVien}}">
                    <span class="m-form__help">
                        Tên Khóa Học
                    </span>
                </div>



                <label class="col-lg-1 col-form-label">
                    Thời gian bắt đầu
                </label>
                <div class="col-lg-3">

                    <input name="timestart" id="m_datepicker_1" class="form-control m-input" placeholder="Thời Gian Bắt Đầu....">
                    <span class="m-form__help">
                        Chọn Thời gian Bắt đầu
                    </span>
                </div>
                <label class="col-lg-1 col-form-label">
                    Chọn Môn:
                </label>
                <div class="col-lg-3">

                    <select class="form-control m-input m-input--air" id="selectmonhoc">

                        @foreach ($ArrayMon as $itemMon)
                        <option value=" {{$itemMon["IdMon"]}}">
                            {{$itemMon["TenMon"]}}
                        </option>
                        @endforeach
                    </select>
                    <span class="m-form__help">
                        Chọn Môn Phù Hợp Với Khóa Học
                    </span>
                </div>
                {{-- end --}}
                <label class="col-lg-1 col-form-label">
                    Thời gian Kết Thức
                </label>
                <div class="col-lg-3">

                    <input name="timeend" id="m_datepicker_1" class="form-control m-input" placeholder="Thời gian Kết Thúc ...">
                    <span class="m-form__help">
                        Chọn Thời gian Kết Thúc
                    </span>
                </div>
                {{-- end --}}

            </div>


        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-brand">
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



    <!--end::Form-->
</div>

<div class="m-portlet">
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
        <div class="m-portlet__head-tools">
            Thêm Khóa học:
            <a href="#" class="viewAddGiangVien m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                <i class="fa fa-plus"></i>
            </a>

        </div>
    </div>
    <div class="m-section">

    
    <div class="row">

        @foreach ($Course as $item)

        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> Môn:{{$item->TenMonHoc}}

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Tác Giả:
                        <b>{{$item->TenGiangVien}}</b>
                    </li>
                    <li class="list-group-item"> Time Start:
                        <b> {{$item->infoKhoHoc['time_start']}}</b>
                    </li>
                    <li class="list-group-item"> Time End:
                        <b>{{$item->infoKhoHoc['time_end']}}</b>
                    </li>

                </ul>
                <div class="card-body">

                    <a tengiangvien="{{$item->TenGiangVien}}" tenmon="{{$item->TenMonHoc}}" href="#" data-toggle="modal" data-target="#chitietkhoahoc"
                        class=" btn-dkkhoahoc btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">Chi Tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>


<div class="modal fade show" id="chitietkhoahoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Chi Tiết Khóa Học
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card bg-dark text-white">
                    <img class="card-img" data-src="http://unitop.vn/public/images/banner.png" alt="100%x270" style="height: 270px; width: 100%; display: block;"
                        src="http://unitop.vn/public/images/banner.png" data-holder-rendered="true">
                    <div class="card-img-overlay">
                        Môn Học:
                        <h5 class="card-title tenkhoahoc"></h5>
                        Tác giả:
                        <p class="card-text tentacgia"></p>
                        <p class="card-text">

                        </p>


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
</div>
@endsection