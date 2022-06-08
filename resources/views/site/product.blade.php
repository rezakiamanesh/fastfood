@extends('site.layouts.master')
@section('site-css')
    <link href="{{ asset('site_theme/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site_theme/css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('site_theme/css/breadcrumb.css') }}" rel="stylesheet">
@endsection
@section('site-js')
    <script src="{{ asset('site_theme/js/jquery.lazyload.js') }}"></script>
    <script src="{{ asset('site_theme/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('site_theme/js/zoom.js') }}"></script>
    <script src="{{ asset('site_theme/js/products.js') }}"></script>
    <script>
        $(document).ready(function () {
            // assign captions from title-attributes:
            $("[data-fancybox]").each(function () {
                $(this).attr("data-caption", $(this).attr("title"));
            });
            // start fancybox on all elements with attribute 'data-fancybox':
            $("[data-fancybox]").fancybox();
        });
    </script>
    <script>

        $(document).ready(function() {
            $(".reply").click(function () {
                var reply = $(this);
                var id = reply.attr('sub_id');

                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#section6").offset().top
                }, 1200);
                $('.response-parent-id').val(id);

            });
            var bigimage = $("#big");
            var thumbs = $("#thumbs");
            //var totalslides = 10;
            var syncedSecondary = true;
            bigimage
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: true,
                    margin:1,
                    autoplay: false,
                    dots: false,
                    rtl:true,
                    loop: true,
                    responsiveRefreshRate: 200,
                    navText: ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
                })
                .on("changed.owl.carousel", syncPosition);
            thumbs
                .on("initialized.owl.carousel", function() {
                    thumbs
                        .find(".owl-item")
                        .eq(0)
                        .addClass("current");
                })
                .owlCarousel({
                    items: 5,
                    dots: true,
                    margin:10,
                    rtl:true,
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ],
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: 1,
                    responsiveRefreshRate: 100
                })
                .on("changed.owl.carousel", syncPosition2);
            function syncPosition(el) {
                //if loop is set to false, then you have to uncomment the next line
                //var current = el.item.index;
                //to disable loop, comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //to this
                thumbs
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumbs.find(".owl-item.active").length - 1;
                var start = thumbs
                    .find(".owl-item.active")
                    .first()
                    .index();
                var end = thumbs
                    .find(".owl-item.active")
                    .last()
                    .index();
                if (current > end) {
                    thumbs.data("owl.carousel").to(current, 100, true);
                }
                if (current < start) {
                    thumbs.data("owl.carousel").to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    bigimage.data("owl.carousel").to(number, 100, true);
                }
            }
            thumbs.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                bigimage.data("owl.carousel").to(number, 300, true);
            });
        });


    </script>

@endsection
@section('content')
    <div class="container-fliud cont-categori-inner gap-col-mob col-top ">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('site.index') }}"><i class="fa fa-home"></i></a></li>
                        <li class="gap">/</li>
                        <li>
                            <a href=" {{ $product->categories[0]->path() }}"> {{ $product->categories[0]->title }}</a>
                        </li>
                        <li class="gap">/</li>
                        <li><a>{{ $product->title }}</a></li>
                    </ul>
                </div>

            </div>
            <div class="row c-product mt-3">
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 col-xs-12">

                                    @if(isset($product->image) && !empty($product->image))
                                        <div id="big" class="owl-carousel owl-theme">
                                            @foreach($product->image as $image)
                                                <div class="item" title="">
                                                    <a class="open-gallery" data-fancybox="mygallery"
                                                       href="{{ $image->url }}">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <img title="{{ $product->title }}" alt="{{ $product->title }}"
                                                         src="{{ $image->url }}"
                                                         alt="لازانیا گوشت و قارچ"
                                                         data-zoom-image="{{ $image->url }}"/>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div id="thumbs" class="owl-carousel owl-theme mt-3">
                                            @foreach($product->image as $image)
                                                <div class="item">
                                                    <img title="{{ $product->title }}" alt="{{ $product->title }}"
                                                         src="{{ $image->url }}"
                                                         alt="{{ $product->title }}"/>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif


                                </div>
                                <div class="col-md-7 col-xs-12 gap-col">
                                    <div class="row row-pro-name">
                                        <div class="col-sm-12 col-xs-12">
                                            <h1 class="c-product__title">
                                                {{ $product->title }}
                                            </h1>
                                        </div>


                                    </div>
                                    <div class="row row-middel-pro">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="row" style="margin-bottom: 10px">
                                                <div class="col-12p-0">

                                                    <ul class="c-product__directory">

                                                        <li>
                                                            <span>دسته‌بندی</span> :
                                                            <a href="{{ $product->categories[0]->path() }}"
                                                               class="btn-link-spoiler">
                                                                {{ $product->categories[0]->title }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <span>زمان آماده سازی</span> :
                                                            <span class="btn-link-spoiler">
                                                                {{ $product->time_to_prepare }} دقیقه بعد از سفارش
                                            </span>
                                                        </li>
                                                        <li>
                                                            <span>- موجودی </span> :
                                                            <span class="btn-link-spoiler">
                                                {{ $product->stock }}
                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 p-0 rate text-center">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 gap-col gap-col-mob">
                                                    <ul class="item-pro js-variant-price">
                                                        <li class="">

                                                            <span><label class="control-label options" for="variant_id">بسته بندی مورد نظر</label></span>
                                                            <span>

                                                <div class="select-categories">
                                                    <select name="variant_id" id="variant_id">
                                                                                                                    <option
                                                                                                                        value="63">بسته بندی در جعبه چوبی</option>
                                                                                                            </select>
                                                </div>
                                                                                            </span>
                                                        </li>


                                                        <li class=" text-center ">

                                                            <div class="cost-pro">

                                                                <p class="price-special" style=" display:none ">

                                                       <span class="text-red clearfix c-price__value">
                                                            <span
                                                                class="js-price-value price_actual">  {{ number_format($product->price) }} </span>

                                                            <span class="c-price__currency">تومان</span>
                                                       </span>


                                                                </p>

                                                                <p class="alert alert-secondary price-unspecial"
                                                                   style=" display:block ">
                                                                    <span
                                                                        class="js-price-value total"> {{ number_format($product->price) }} </span>
                                                                    <span class="c-price__currency">تومان</span>


                                                                </p>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="c-add-to-card">
                                         <span
                                             class="btn-add-to-cart js-add-to-cart js-btn-add-to-cart   button-card "
                                             product_id="1132" quantity="1" variant_id="63">
                                        <span class="icons"><i class="fas fa-cart-plus"></i></span>
                                        <span
                                            class="btn-add-to-cart__txt button-card">  افــزودن به سبــد خریــد </span></span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-feature">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-tab">
                <div class="col-12 p-0">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" href="#tab1default" data-toggle="tab">توضیحات</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#tab5default"
                                                        data-toggle="tab">مشخصات</a></li>


                                <li class="nav-item"><a class="nav-link" href="#tab4default" data-toggle="tab">نقد
                                        کاربران</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane  in active" id="tab1default">
                                    <div class="description">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="tab5default">
                                    <article>


                                        <section>
                                            <h3 class="c-params__title">خصوصیات محصول</h3>
                                            <ul class="c-params__list">
                                                <li>
                                                    <div class="c-params__list-key">
                                                        <span class="block">مواد تشکیل دهنده</span>
                                                    </div>
                                                    <div class="c-params__list-value">
                                                        <span class="block">گوشت چرخ کرده، قارچ، پیاز، فلفل دلمه، ۲مدل پنیر، سس بشامل، ادویه مخصوص</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="c-params__list-key">
                                                        <span class="block">مناسب برای</span>
                                                    </div>
                                                    <div class="c-params__list-value">
                                                        <span class="block">۸ تا ۱۰ نفر</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="c-params__list-key">
                                                        <span class="block">نوع بسته بندی</span>
                                                    </div>
                                                    <div class="c-params__list-value">
                                                        <span class="block">سینی ۲۵ تایی</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="c-params__list-key">
                                                        <span class="block">نوع وعده غذایی</span>
                                                    </div>
                                                    <div class="c-params__list-value">
                                                        <span class="block">وعده اصلی</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h3 class="c-params__title">توضیحات محصول</h3>
                                            <ul class="c-params__list">
                                                <li>
                                                    <div class="c-params__list-key">
                                                        <span class="block">با چه چیز سرو شود؟</span>
                                                    </div>
                                                    <div class="c-params__list-value">
                                                        <span class="block">کنار سالادهای سرد و انواع فینگر فودها سرو میشود.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="c-params__list-key">
                                                        <span class="block">داستانش چیه؟</span>
                                                    </div>
                                                    <div class="c-params__list-value">
                                                        <span class="block">لازانیا یا خمیر برگ نوعی غذای ایتالیایی است که از لایه های سه گانه پاستا ورقه ای، سس مخصوص و پنیر پیتزا درست شده است.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>

                                    </article>
                                </div>


                                <div class="tab-pane fade" id="tab3default">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 gap-col">
                                            <div class="owl-carousel owl-theme  owl-sugest">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4default">
                                    <div class="row">
                                    </div>
                                    @include('site.layouts.partials.comment',['entity' => $product])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--content-end-->
    </div>

@endsection
