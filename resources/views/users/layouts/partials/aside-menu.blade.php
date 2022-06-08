<div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
    <div class="profile-box">
        <div class="profile-box-header">
            <div class="profile-box-avatar">
                <img src="{{ asset('users_theme/assets/img/svg/user.svg') }}" alt="">
            </div>
            <a href="{{ route('users.panel.profile') }}" class="profile-box-btn-edit">
                <i class="fa fa-pencil"></i>
            </a>

        </div>
        <div class="profile-box-username">{{ auth()->user()->fullName }}</div>
        <div class="profile-box-tabs">
            <a href="{{ route('users.panel.changePwFrom') }}" class="profile-box-tab profile-box-tab-access">
                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                تغییر رمز
            </a>
            <a href="{{ route('logout') }}" class="profile-box-tab profile-box-tab--sign-out">
                <i class="now-ui-icons media-1_button-power"></i>
                خروج از حساب
            </a>
        </div>
    </div>
    <div class="responsive-profile-menu show-md">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-navicon"></i>
                حساب کاربری شما
            </button>
            <div class="dropdown-menu dropdown-menu-right text-right">
                <a href="{{ route('users.dashboard.index') }}" class="dropdown-item">
                    <i class="now-ui-icons users_single-02"></i>
                    پروفایل
                </a>
                <a href="{{ route('users.panel.order.index') }}" class="dropdown-item">
                    <i class="now-ui-icons shopping_basket"></i>
                    همه سفارش ها
                </a>

                <a href="{{ route('users.panel.profile') }}" class="dropdown-item">
                    <i class="now-ui-icons business_badge"></i>
                    اطلاعات شخصی
                </a>
                <a href="{{ route('users.panel.address') }}" class="dropdown-item">
                    <i class="now-ui-icons business_badge"></i>
                    آدرس ها
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item ">
                    <i class="now-ui-icons media-1_button-power"></i>
                   خروج از حساب کاربری
                </a>

            </div>
        </div>
    </div>
    <div class="profile-menu hidden-md">
        <div class="profile-menu-header">حساب کاربری شما</div>
        <ul class="profile-menu-items">
            <li>
                <a href="{{ route('users.dashboard.index') }}" class="">
                    <i class="now-ui-icons users_single-02"></i>
                    پروفایل
                </a>
            </li>
            <li>
                <a href="{{ route('users.panel.order.index') }}" class="">
                    <i class="now-ui-icons shopping_basket"></i>
                    همه سفارش ها
                </a>
            </li>

            <li>
                <a href="{{ route('users.panel.profile') }}" class="">
                    <i class="now-ui-icons business_badge"></i>
                    اطلاعات شخصی
                </a>
            </li>
            <li>
                <a href="{{ route('users.panel.address') }}" class="">
                    <i class="now-ui-icons location_map-big"></i>
                    آدرس ها
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" >
                    <i class="now-ui-icons media-1_button-power"></i>
                    خروج از حساب کاربری
                </a>
            </li>
        </ul>
    </div>
</div>
