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

    @if (auth()->user()->isSuperAdmin() || auth()->user()->isAdmin())
        <div class="row">
            @include('generals.sessionMessage')
            @include('generals.allErrors')
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

            {{-- all job --}}
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-cyan">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10"> مشاغل </div>
                    <h3 class="m-b-0"> {{ isset($countJob) ? $countJob : 0  }}
                        <i class="material-icons">today</i>
                    </h3>
                    <small class="displayblock">تعداد کل  مشاغل</small>
                </div>
            </div>

            {{-- Count news --}}
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-danger">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">اخبار</div>
                    <h3 class="m-b-0">{{ isset($countNews) ? $countNews : 0  }}
                        <i class="material-icons">rss_feed</i>
                    </h3>
                    <small class="displayblock">تعداد کل اخبار</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-dark-gray">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">آگهی</div>
                    <h3 class="m-b-0">{{ isset($countAdvertisment) ? $countAdvertisment : 0  }}
                        <i class="material-icons">location_city</i>
                    </h3>
                    <small class="displayblock">تعداد کل آگهی</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-amber">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">رویداد</div>
                    <h3 class="m-b-0">{{ isset($countEvent) ? $countEvent : 0  }}
                        <i class="material-icons">date_range</i>
                    </h3>
                    <small class="displayblock">تعداد کل رویداد</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-purple">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">مسابقات</div>
                    <h3 class="m-b-0">{{ isset($countCompetition) ? $countCompetition : 0  }}
                        <i class="material-icons">people</i>
                    </h3>
                    <small class="displayblock">تعداد کل مسابقات</small>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center bg-green">
                    <div class="icon m-b-10">
                    </div>
                    <div class="text m-b-10">ویدیو</div>
                    <h3 class="m-b-0">{{ isset($countVideo) ? $countVideo : 0  }}
                        <i class="material-icons">local_movies</i>
                    </h3>
                    <small class="displayblock">تعداد کل ویدیو</small>
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



    {{-- log viewer --}}
    <!--state overview end-->
    @if (auth()->user()->isSuperAdmin())
        <a href="{{ url('log-viewer') }}" target="_blank"><h1
                    class="page-header h-panel-log">@lang('cms.error-reporting')</h1></a>

    @endif


@endsection
{{-- #content --}}
