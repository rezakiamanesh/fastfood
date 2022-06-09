@extends('site.layouts.master')
@section('site-css')
    @include('users.layouts.partials.styles')
@endsection
@section('title',$title)
@section('content')
    @php
        $finish = 0;
        $nextUrl = route('site.checkout');
    @endphp
    <div class="wrapper default shopping-page">
        <main class="cart-page default">
            <div class="container">
                <div class="row">
                    <div class="cart-page-content col-xl-9 col-lg-8 col-md-12 order-1">
                        <div class="cart-page-title">
                            <h1>انتخاب آدرس تحویل سفارش</h1>
                        </div>
                        <section class="page-content default">
                            @if(isset(auth()->user()->address) && !empty(auth()->user()->address))
                                @foreach(auth()->user()->address as $key => $itemAddress)
                                    <div class="address-section">
                                        <label class="checkout-contact" style="width: 100%">
                                            <div class="checkout-contact-content">
                                                <ul class="checkout-contact-items">
                                                    <li class="checkout-contact-item">
                                                        گیرنده:
                                                        <span class="full-name">{{ $itemAddress->name }}</span>
                                                        @if(!auth()->user()->isAdmin())
                                                            <a class="checkout-contact-btn-edit">اصلاح این آدرس</a>
                                                        @endif
                                                    </li>
                                                    <li class="checkout-contact-item">
                                                        <div class="checkout-contact-item checkout-contact-item-mobile">
                                                            شماره تماس:
                                                            <span
                                                                class="mobile-phone">{{ $itemAddress->mobile  }}</span>
                                                        </div>
                                                        <div class="checkout-contact-item-message">
                                                            کد پستی:
                                                            <span
                                                                class="post-code"> {{ $itemAddress->postal_code  }}</span>
                                                        </div>
                                                        <br>
                                                        استان
                                                        <span class="state">{{ $itemAddress->city->province->name }}</span>
                                                        ، ‌شهر
                                                        <span class="city">{{ $itemAddress->city->name }}</span>
                                                        ،
                                                        <span
                                                            class="address-part">{{ $itemAddress->full_address }}</span>
                                                    </li>
                                                </ul>
                                                <div class="checkout-contact-badge">
                                                    @if(isset($sessionAddress) && !empty($sessionAddress))
                                                        <input type='radio'
                                                               {{ $sessionAddress->id == $itemAddress->id ? "checked" : null  }} name="address"
                                                               data-attr="{{$itemAddress->id}}"
                                                               id='checkbox-{{$itemAddress->id}}'>
                                                    @else
                                                        <input type='radio' checked name="address"
                                                               data-attr="{{$itemAddress->id}}"
                                                               id='checkbox-{{$itemAddress->id}}'>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--                                            <a class="checkout-contact-location">ویرایش</a>--}}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <span>برای ارسال سفارش آدرس مقصد را اضافه نمایید</span>
                            @endif

                            @if(isset($basket) && !empty($basket))
                                <form method="post" id="shipping-data-form">
                                    <div class="headline">
                                    </div>
                                    <div class="checkout-pack">
                                        <section class="products-compact">
                                            <div class="box">
                                                <div class="row">
                                                    @foreach($basket as $item)
                                                        @if(is_array($item))
                                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                                <div class="product-box-container">
                                                                    <div class="product-box product-box-compact">
                                                                        <a class="product-box-img">
                                                                            <img src="{{ $item['image'] }}"
                                                                                 alt="{{ $item['name'] }}">
                                                                        </a>
                                                                        <div class="product-box-title">
                                                                            {{ $item['name'] }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form>
                            @endif
                        </section>
                    </div>
                    @include('site.checkout.partials.card-aside')
                </div>
            </div>
        </main>
    </div>
@endsection


