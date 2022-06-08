@extends('site.layouts.master')

@section('content')
    <section id="mainSlider" class="container-fluid p-0">
        <div class="row">
            <div class="col-12 p-0">
                <div class="owl-carousel owl-theme owl-slider">
                    <div class="item">
                        <div class="row">
                            <div class="col-12 p-0 image-slider">
                                <!--عکس دسکتاپ مربوط به اسلاید-->
                                <img
                                    src="https://foodbamaze.com/public/storage/images/banners/2020/12/ZYkSI0S8OdhzR1iEJPHZX1Q6oIS8HQcvpqOQOaylCLD3IPzQRZuJ7TYUVW2l7hGF-1350x570.jpeg"
                                    alt="خوشمزه شروع کنید" width="1349" height="562" class="d-none d-md-block"/>
                                <!--عکس موبایل مربوط به اسلاید-->
                                <img
                                    src="https://foodbamaze.com/public/storage/images/banners/2020/12/YtoRxWvjdXa929bqiK322b6IspgiMDkMMPnaKYeN12csKgfrDsCQWYjunck2IrL6-640x240.jpeg"
                                    alt="Aria" class="d-xl-none d-lg-none d-md-none"/>
                            </div>
                        </div>
                        <div class="intro-content">

                            <div class="main-img-slider animated slideInUp"><img
                                    src="/storage/images/banners/2020/12/u7Vrh3u3RTf4HL4k86C1EgTkyCIkUYp0V7fIWJp37B06udE9YrRj3CZXEoxUvw0e-220x213.png">
                            </div>
                            <p class="main-text-slider animated slideInUp">خوشمزه شروع کنید</p>
                            <ul class="link-slider">
                                <li class="lnk-slide1 animated slideInUp">

                                    <p class="">لمس مزه ها با فودبامزه </p>
                                </li>
                                <li class="lnk-slide2 animated zoomIn">
                                    <a href="#" class="btn btn-link-slide">همین الان سفارش
                                        بده</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-12 p-0 image-slider">
                                <!--عکس دسکتاپ مربوط به اسلاید-->
                                <img
                                    src="https://foodbamaze.com/public/storage/images/banners/2020/12/WDH9OxWNbfQvUEONx5j92jFMCLsyQEhoGk2sp54FS3akiLjHZ0fIf0b7uu8WY1H8-1350x570.jpeg"
                                    alt="سلامت شما برای ما اولویت است" width="1349" height="562"
                                    class="d-none d-md-block"/>
                                <!--عکس موبایل مربوط به اسلاید-->
                                <img
                                    src="https://foodbamaze.com/public/storage/images/banners/2020/12/LKs1jcsr1P8XbX2q9AnAVbYz3SKb6cGmO2jxRIuvn46uHZYwqjJ4eCyefkhQPTS2-640x240.jpeg"
                                    alt="Aria" class="d-xl-none d-lg-none d-md-none"/>
                            </div>
                        </div>
                        <div class="intro-content">

                            <div class="main-img-slider animated slideInUp"><img
                                    src="/storage/images/banners/2020/12/u7Vrh3u3RTf4HL4k86C1EgTkyCIkUYp0V7fIWJp37B06udE9YrRj3CZXEoxUvw0e-220x213.png">
                            </div>
                            <p class="main-text-slider animated slideInUp">سلامت شما برای ما اولویت است</p>
                            <ul class="link-slider">
                                <li class="lnk-slide1 animated slideInUp">

                                    <p class="">تمامی مراحل از آماده سازی تا تحویل محصول در شرایط بهداشتی انجام
                                        میشود </p>
                                </li>
                                <li class="lnk-slide2 animated zoomIn">
                                    <a href="#" class="btn btn-link-slide">همین الان سفارش
                                        بده</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid latest-product">
        <div class="container p-0">
            <div class="row">
                <div class="col-12 p-0 text-center">
                    <h2 class="caption-section"><span>Our menu </span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-0 text-center">
                    <span class="icon-theme icon-section"></span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 p-0">
                    <div class="title-section">
                        <span class="main-title">محصولات ما</span>
                    </div>
                    <div class="board">
                        <div class="board-inner">
                            <ul class="nav nav-tabs" id="myTab">

                            </ul>
                        </div>
                        <div class="tab-content mt-5">
                            <div class="tab-pane fade active show  " id="tab1">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="ul-tab ">
                                            @foreach($products as $product)
                                                <li>
                                                    <a href="{{ $product->path() }}"
                                                       class="thumbnail productcard">
                                                        <div class="row img-box">
                                                            <div class="col-12 p-0">
                                                                @if(isset($product->image[0]) && !empty($product->image[0]))
                                                                    <img
                                                                        src="{{ $product->image[0]->url }}"
                                                                        width="223" height="223" alt="{{ $product->title }}"
                                                                        style="    border-radius: 50%;"
                                                                        class="img-fluid">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-12 p-2 text-center">
                                                                <span class="pro-name">{{ $product->title }}</span>
                                                            </div>
                                                            <div class="col-md-12 col-12 p-2 text-center">
                                                                <span class="cost-pro">
                                                                    <span class="v-cost">{{ number_format($product->price) }}</span>
                                                                    <span class="u-cost">تومان</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <div class="order-btn">
                                                                 <span class="order"
                                                                       onclick="location.href='{{ $product->path() }}'">
                                                                          <i class="fas fa-plus-circle"></i>
                                                                          سفارش دهید
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
