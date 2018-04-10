@extends('front.layout') @section('m-content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Tạo Bài Viết
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->

</div>
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Nội Dụng
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" id="thembaiviet" novalidate="novalidate">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
                    Tiêu đề
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <input class="form-control m-input tt-input " name="title" type="text" aria-describedby="memo-error" aria-invalid="true" placeholder="Tiêu Đề Bài Viết ....."
                    />
                  <div id="memo-error" class="form-control-feedback">Please enter at least 10 characters.</div>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
                    Nội Dụng:
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <div class="summernote"> </div>
                       <div id="memo-error" class="form-control-feedback">Please enter at least 10 characters.</div>
                </div>
            </div>
            <div class="form-group m-form__group row has-danger">
                <div class="col-lg-3 col-sm-12">
                </div>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-brand">
                        <input value="1" name="checkPublish" type="checkbox"> Publish
                        <span></span>
                    </label>
                </div>

            </div>






        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-brand">
                            Đăng bài
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






@endsection