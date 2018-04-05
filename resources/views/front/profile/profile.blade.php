@extends('front.layout') @section("m-content")
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="../assets/app/media/img/users/user4.jpg" alt="">
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">
                            Mark Andre
                        </span>
                        <a href="" class="m-card-profile__email m-link">
                            mark.andre@gmail.com
                        </a>
                    </div>
                </div>

                <div class="m-portlet__body-separator"></div>

            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                Update Profile
                            </a>
                        </li>


                    </ul>
                </div>

            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional
                                    classes.
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">
                                        1. Personal Details
                                    </h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Full Name
                                </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="Mark Andre">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Occupation
                                </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="CTO">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Company Name
                                </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="Keenthemes">
                                    <span class="m-form__help">
                                        If you want your invoices addressed to a company. Leave blank to use your full name.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Phone No.
                                </label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="text" value="+456669067890">
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                            
                            
                           
                            
                           
                     </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-7">
                                        <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                           Lưu Thông Tin
                                        </button>
                                        &nbsp;&nbsp;
                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane active" id="m_user_profile_tab_2"></div>
            </div>
        </div>
    </div>
</div>
@endsection