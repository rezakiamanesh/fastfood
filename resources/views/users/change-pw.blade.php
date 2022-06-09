@extends('site.layouts.master')
@section('site-css')
    @include('users.layouts.partials.styles')
@endsection
@section('content')
    <main class="profile-user-page default">
        <div class="container wrapper default">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">تغییر گذرواژه</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="title-tab-content">تغییر گذرواژه حساب کاربری</h1>
                                    </div>
                                </div>
                                @include('generals.allErrors')
                                <div class="account-box">
                                    <a href="#" class="logo">
                                        <img src="assets/img/logo.png" alt="">
                                    </a>
                                    <div class="account-box-title">تغییر رمز عبور</div>
                                    <div class="account-box-content">
                                        <form class="form-account" action="{{ route('users.change.password') }}" method="post">
                                            @csrf
                                            <div class="form-account-title">رمز عبور قبلی</div>
                                            <div class="form-account-row">
                                                <label class="input-label"><i class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                                <input name="current-password" class="input-field" type="password" placeholder="رمز عبور قبلی خود را وارد نمایید">
                                            </div>
                                            <div class="form-account-title">رمز عبور جدید</div>
                                            <div class="form-account-row">
                                                <label class="input-label"><i class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                                <input name="new-password" class="input-field" type="password" placeholder="رمز عبور جدید خود را وارد نمایید">
                                            </div>
                                            <div class="form-account-title">تکرار رمز عبور جدید</div>
                                            <div class="form-account-row">
                                                <label class="input-label"><i class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                                <input name="new-password-confirmation" class="input-field" type="password" placeholder="رمز عبور جدید خود را مجددا وارد نمایید">
                                            </div>
                                            <div class="form-account-row form-account-submit">
                                                <div class="parent-btn">
                                                    <button class="dk-btn dk-btn-info">
                                                        تغییر رمز عبور
                                                        <i class="now-ui-icons arrows-1_refresh-69"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('users.layouts.partials.aside-menu')
            </div>
        </div>
    </main>
@endsection
