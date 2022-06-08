@extends('panel.layout.master')

{{-- top bar --}}
@section('top-menu')
    @include('panel.layout.partials.topNav')
@stop
{{-- #top bar --}}

{{-- asside right --}}
@section('right-menu')
    @include('panel.layout.partials.rightNav')
@stop
{{-- #asside right --}}

{{-- content --}}
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('panel.layout.partials.breadcrumb',
                    [
                     'title' => isset($title) ? $title : "" ,
                     'route' => isset($route) ? $route : ""
                    ]
                )
            </div>
        </div>
    </div>

    @if (auth()->user()->isAdmin())
        <div class="row">
            {{-- Start Of count all users--}}
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-blue">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">کاربران</div>
                    <h3 class="m-b-0">{{ isset($countUser) ? $countUser : 0 }}
                        <i class="material-icons">account_circle</i>
                    </h3>
                    <small class="displayblock">تعداد کاربران وبسایت</small>
                </div>
            </div>
            {{-- End Of count all users--}}

            {{-- Start Of count all category--}}
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-orange">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">دیدگاه ها</div>
                    <h3 class="m-b-0">{{ isset($countComment) ? $countComment : 0 }}
                        <i class="material-icons">comment</i>
                    </h3>
                    <small class="displayblock">تعداد کل دیدگاه ها</small>
                </div>
            </div>
            {{-- End Of count all category--}}

            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-cyan">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10"> محصولات </div>
                    <h3 class="m-b-0"> {{ isset($countProducts) ? $countProducts : 0  }}
                        <i class="material-icons">today</i>
                    </h3>
                    <small class="displayblock">تعداد کل  محصولات</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-danger">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">سفارشات</div>
                    <h3 class="m-b-0">{{ isset($countOrders) ? $countOrders : 0  }}
                        <i class="material-icons">rss_feed</i>
                    </h3>
                    <small class="displayblock">تعداد کل سفارشات</small>
                </div>
            </div>

        </div>
    @endif

    <div class="row  clearfix">
        <!-- Customer Review -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong>{{ auth()->user()->fullName }}</strong> عزیز خوش آمدی</h2>
                </div>
                @if(isset($notifications) && !empty($notifications))
                    <div class="body">
                        <div class="review-block">
                            <div class="row">
                                <div class="col">
                                    <p class="m-t-15 m-b-15">
                                        {!! isset($notifications) ? $notifications->code4 : null !!}
                                    </p>
                                </div>
                            </div>
                            <div class="text-center  m-b-5">
                                @can('panel.profile.index')
                                <a href="{{ route('panel.profile.index') }}" class="b-b-primary text-primary btn btn-primary">پروفایل
                                    من</a>
                                    @endcan
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- #END# Customer Review -->
    </div>




@endsection
{{-- #content --}}
