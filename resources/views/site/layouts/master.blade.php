<!DOCTYPE html>
<html dir="rtl" lang="fa" class="ie9">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> فود با مزه
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
          content="فود با مزه, فینگر فود, سفارش مهمانی, سفارش فینگر فود, فروشگاه اینترنتی, سفارش تولد, برگزاری تولد, راتا, راتا فینگر, پذیرایی, جلسه دفاع, دفاع, پایان نامه, جشن, فينگرفود تهران, سینی مزه, سینی چوبی, سینی میکس, سینی فینگرفود ,سینی راتا, تارت, راتا مرغ, راتا ژامبون, مینی برگر, الویه, اولویه ,غذا پرسی, غذا یک نفره ,پارتی, تولد, نامزدی, پذیرایی دفاع, برگزاری جلسه دفاع, راتامرغ, راتافینگرفود, فینگرفود لاکچری,ساندويچ, سالاد, دسر, پک پذیرایی, پک, پک دفاع, سینی سفره عقد, یلدا">
    <meta name="description"
          content="فود با مزه ارائه سینی های فینگر فود به صورت تکی، ترکیبی ارائه انواع سالادها و دسرهای مخصوص  ارائه انواع مزه ها و نوشیدنی ها ارائه خدمات مربوط به دورهمی ها، جشنها، ارائه ها، سیمنارها ارائه کلاس های آموزشی مربوط به فینگر فود">
    <meta name="og:title" content="فود با مزه">
    <meta name="og:description"
          content="فود با مزه ارائه سینی های فینگر فود به صورت تکی، ترکیبی ارائه انواع سالادها و دسرهای مخصوص  ارائه انواع مزه ها و نوشیدنی ها ارائه خدمات مربوط به دورهمی ها، جشنها، ارائه ها، سیمنارها ارائه کلاس های آموزشی مربوط به فینگر فود">
    <meta name="og:site_name" content="فود با مزه"/>
    <meta name="og:url" content="https://foodbamaze.com/public/index.php">
    <link rel="alternate" href="https://foodbamaze.com/public/index.php" hreflang="fa-ir"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/fontawesome-all.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/flag-icon.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/animate.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_theme/css/template.css') }}"/>
    <style>
        .modal-content-loading {
            border: none !important;
            box-shadow: none !important;
            top: 200px;
            text-align: center;
            left: -23%;
        }

        .modal-content-loading img {
            width: 150px;
        }

        #bankloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        #bankloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }

        #bankloader span {
            display: block;
            left: 50%;
            margin-left: -110px;
            margin-top: -32px;
            position: absolute;
            top: 37%;
            font-weight: bolder;
            font-size: 25px;
            color: #019854;
        }

        .swal-icon {
            margin: 40px auto !important;
        }

        .swal-text {
            text-align: right !important;
        }
    </style>
    <style>
    </style>
    <script src="{{ asset('site_theme/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('site_theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('site_theme/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site_theme/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('site_theme/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('site_theme/js/soon.js') }}"></script>
    <script type="text/javascript">
        function autoRefreshPage() {
            window.location.reload();
        }

        setInterval('autoRefreshPage()', 20 * 60000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @include('sweetalert::alert')
    @yield('site-css')
    @livewireStyles

</head>

<body class="">
<div class="modal loading fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-content-loading" style="width: 150px">
            <img src='/images/added-sucessfully.gif'>
        </div>
    </div>
</div>
<div class="page">
    @include('site.layouts.partials.header')
    <div id="overlay" class="overlay"></div>


    <div>
        @yield('content')
    </div>
    @include('site.layouts.partials.footer')
</div>
<!--سرچ باکس-->
<div class="box-search" id="box-search">
    <div class="search-inner">
        <form action="https://foodbamaze.com/public/index.php/products/search/view" method="post" class="search-form"
              id="search-form">
            <input type="hidden" name="_token" value="ETlAvOa4PkpqsLVqVUjC8OpZ0A9TawwMYNkigGiv">
            <div class="frm">
                <input id="txt-search" type="text" placeholder="جستجو کنید..." class="input-search" name="name"
                       autocomplete="off">
                <button class="btn-serch">جستجو</button>
            </div>
            <div class="search-loader" style="display: none"></div>
        </form>
    </div>
</div>
<div class="container-fluid copy-right">
    <div class="container gap-col-mob">
        <div class="row">
            <div class="col-md-6 col-12 p-0">
                <p class="coy-right">Copyright ALLORO MILANO . All rights reserved.</p>
            </div>
            <div class="col-md-6 col-12 p-0">
                <p class="npco">© 2018 DESIGNED BY<span class="color">AsiaTech </span>. ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </div>
</div>
@yield('site-js')

<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 1000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }

    myFunction();
</script>

<script src="{{ asset('site_theme/js/lozad.min.js') }}"></script>
<script src="{{ asset('site_theme/js/script.js') }}"></script>

<div style="text-indent:-500%;position: absolute;z-index:-9;bottom: 0px;">
    <h1>بامزه</h1>
    <h2>بامزه</h2>
</div>
@livewireScripts

</body>
</html>
