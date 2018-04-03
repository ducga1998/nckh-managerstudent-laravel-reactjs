<div class="m-portlet">
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
    <form id="FormAddGiangVien" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="http://localhost:8000/admin">
        {!! csrf_field() !!}
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-lg-1 col-form-label">
                    Full Name:
                </label>
                <div class="col-lg-3">
                    <input name="name"  class="form-control m-input" placeholder="Full name">
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
					<option>
						KHMT
							</option>
							<option>
									CNPM
								</option>
								<option>
									MANG
								</option>
									<option>
										HTTT
									</option>
								<option>
																		</option>
											</select>
                </div>


            </div>


        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="submit" type="reset" class="btn btn-brand" onclick="event.preventDefault();
                                                      $('#FormAddGiangVien').ajaxForm(function() {
           alert('Thank you for your comment!');
       });">
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
    <!--end::Form-->
</div>