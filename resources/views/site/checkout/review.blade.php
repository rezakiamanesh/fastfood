@extends('site.layouts.master')
@section('site-css')
    @include('users.layouts.partials.styles')
@endsection

@section('content')
    @php
        $finish = 0;
        $nextUrl = route('site.basketStore');
    @endphp
    <div class="wrapper default shopping-page">
        <main class="cart-page default">
            <div class="container">
                <div class="row pb-5">
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        @if(isset($basket) && !empty($basket))
                            <div class="cart-page-content">
                                @include('generals.allErrors')
                                <div class="cart-page-title">
                                    <h1>کالا های درخواستی</h1>
                                </div>
                                <div class="table-responsive checkout-content default">
                                    <table class="table">
                                        <tbody>
                                        @foreach($basket as $item)
                                            @if(is_array($item))
                                                <tr class="checkout-item">
                                                    <td>
                                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                                    </td>
                                                    <td>
                                                        <h3 class="checkout-title">
                                                            {{ $item['name'] }}
                                                        </h3>
                                                    </td>
                                                    <td>{{ $item['quantity'] }} عدد</td>
                                                    <td>
                                                        {{ number_format($item['price']) }}
                                                    </td>
                                                    {{--                                        <td class="text-center">--}}
                                                    {{--                                            <button type="button" data-attr-add="{{$items['item']->variation_id}}"--}}
                                                    {{--                                               class="dk-btn-basket dk-btn-success addProduct">+</button>--}}
                                                    {{--                                            <button type="button" data-attr-min="{{$items['item']->variation_id}}"--}}
                                                    {{--                                               class="dk-btn-basket dk-btn-danger minProduct">-</button>--}}
                                                    {{--                                        </td>--}}
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        @if(isset($sessionAddress) && !empty($sessionAddress))
                            <div class="cart-page-content">
                                <div class="cart-page-title">
                                    <h1> آدرس تحویل سفارش</h1>
                                </div>
                                <div class="address-section">
                                    <div class="checkout-contact">
                                        <div class="checkout-contact-content">
                                            <ul class="checkout-contact-items">
                                                <li class="checkout-contact-item">
                                                    گیرنده:
                                                    <span class="full-name">{{ $sessionAddress->name }}</span>
                                                </li>
                                                <li class="checkout-contact-item">
                                                    <div class="checkout-contact-item checkout-contact-item-mobile">
                                                        شماره تماس:
                                                        <span class="mobile-phone">{{ $sessionAddress->mobile  }}</span>
                                                    </div>
                                                    <div class="checkout-contact-item-message">
                                                        کد پستی:
                                                        <span
                                                            class="post-code"> {{ $sessionAddress->postal_code  }}</span>
                                                    </div>
                                                    <br>
                                                    استان
                                                    <span class="state">{{ $sessionAddress->province->name }}</span>
                                                    ، ‌شهر
                                                    <span class="city">{{ $sessionAddress->city->name }}</span>
                                                    ،
                                                    <span class="address-part">{{ $sessionAddress->fullAddress }}</span>
                                                </li>
                                            </ul>
                                            <div class="checkout-contact-badge">
                                                <i class="now-ui-icons ui-1_check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 p-0 pl-md-3 cart-page-content">
                                <div class="cart-page-title">
                                    <h1>انتخاب شیوه پرداخت</h1>
                                </div>
                                <section class="page-content default">
                                    @include('site.checkout.partials.payment-methods')
                                </section>
                            </div>
                            <div class="col-md-6 p-0 pr-md-3  cart-page-content">
{{--                                @include('site.checkout.partials.shipping-methods')--}}
                            </div>
                        </div>
                    </div>

                    @include('site.checkout.partials.card-aside')
                </div>
            </div>
        </main>
    </div>
@endsection

@section('site-js')
    <script src="{{asset('site_theme/js/ajax.js')}}"></script>
@endsection
@section('title',$title)
