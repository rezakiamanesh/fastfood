<aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2">
    <div class="checkout-aside">
        <div class="checkout-summary">
            <div class="checkout-summary-main">
                <ul class="checkout-summary-summary">
                    @if(isset($basket) && !empty($basket))
                        @php
                            $priceDiscount = \Illuminate\Support\Facades\Session::get('finishPrice');
                        @endphp
                        @if(isset($tax) && isset($tax->code) && !empty($tax->code))
                            <li><span>@lang('cms.tax')</span><span>{{$tax->code}}% </span></li>
                            @if(isset($priceDiscount) && !empty($priceDiscount))
                                @php
                                    $total = $priceDiscount;

                                    if($total <= 0){
                                         \App\Utility\forgetSession::forgetSession();
                                         \App\Utility\forgetSession::forgetSession(1);
                                         alert()->error(\Illuminate\Support\Facades\Lang::get('cms.finish-count-product'),\Illuminate\Support\Facades\Lang::get('cms.error'))->showConfirmButton('بستن');
                                         header('location: '.route('site.index'));
                                         dd();
                                    }

                                    $priceDiscount = \App\Utility\taxCalculate::taxCalculate($total,1);
                                @endphp
                                <li>
                                    <span> {{ \App\Utility\unit::unit(\App\Http\Controllers\Site\CheckoutController::shippingCost($priceDiscount))  }} </span>
                                </li>
                            @else
                                @php
                                    $total = $basket->totalPrice;
                                    if($total <= 0){
                                        \App\Utility\forgetSession::forgetSession();
                                        \App\Utility\forgetSession::forgetSession(1);
                                        alert()->error(\Illuminate\Support\Facades\Lang::get('cms.finish-count-product'),\Illuminate\Support\Facades\Lang::get('cms.error'))->showConfirmButton('بستن');
                                        header('location: '.route('site.index'));
                                        dd();
                                    }

                                       $totalPrice =  \App\Utility\taxCalculate::taxCalculate($total , 1);
                                @endphp
                                <li>
                                    <span> {{ \App\Utility\unit::unit(\App\Http\Controllers\Site\CheckoutController::shippingCost($totalPrice))  }} </span>
                                </li>
                            @endif
                        @else
                            @if(isset($priceDiscount) && !empty($priceDiscount))
                                @php
                                    $total = $priceDiscount;
                                    $theAmountPayable = isset($basket) && !empty($basket) ? \App\Utility\unit::unit(\App\Http\Controllers\Site\CheckoutController::shippingCost($total)+$shippingCost) : 0;
                                    if($total <= 0){
                                         \App\Utility\forgetSession::forgetSession();
                                         \App\Utility\forgetSession::forgetSession(1);
                                         alert()->error(\Illuminate\Support\Facades\Lang::get('cms.finish-count-product'),\Illuminate\Support\Facades\Lang::get('cms.error'))->showConfirmButton('بستن');
                                         header('location: '.route('site.index'));
                                         dd();
                                    }
                                @endphp
                                <li>
                                    <span>مبلغ کل ({{ $basket->totalQty }} کالا)</span><span
                                            class="total-price">{{ isset($basket) && !empty($basket) ? \App\Utility\unit::unit(\App\Http\Controllers\Site\CheckoutController::shippingCost($total)) : 0 }}</span>
                                </li>
                            @else
                                @php

                                    $total = $basket->totalPrice;
                                    $theAmountPayable = isset($basket) && !empty($basket) ? \App\Utility\unit::unit(\App\Http\Controllers\Site\CheckoutController::shippingCost($total)) : 0;
                                    if($total <= 0){
                                         \App\Utility\forgetSession::forgetSession();
                                         \App\Utility\forgetSession::forgetSession(1);
                                         alert()->error(\Illuminate\Support\Facades\Lang::get('cms.finish-count-product'),\Illuminate\Support\Facades\Lang::get('cms.error'))->showConfirmButton(\Illuminate\Support\Facades\Lang::get('cms.close'));
                                         header('location: '.route('site.index'));
                                         dd();
                                    }
                                @endphp
                                <li>
                                    <span>{{ isset($basket) && !empty($basket) ? \App\Utility\unit::unit(\App\Http\Controllers\Site\CheckoutController::shippingCost($total)) : 0 }}</span>
                                </li>
                            @endif
                        @endif
                    @endif
                    @if(isset(reset($basket->items)['type']) && reset($basket->items)['type'] == \App\Utility\ProductType::SIMPLE && $shippingCost)
                        <li>
                            <span>هزینه ارسال</span>
                            <span>
                                @if(isset($freeShippingTwo) && !empty($freeShippingTwo))
                                    <span class="shipping-value">{!!  (isset($shippingCost) && $shippingCost > 0) || ($basket->totalPrice >= $freeShippingTwo->code) ? number_format($shippingCost) : " <span class='text-danger'><b>رایگان</b></span> (خرید بیش از  ".number_format($freeShippingTwo->code)." تومان ،هزینه ارسال رایگان خواهد بود) "  !!}</span>
                                @else
                                    <span class="shipping-value">{!!  (isset($shippingCost) && $shippingCost > 0) ? number_format($shippingCost) : '---'  !!}</span>
                                @endif
                                <div class="wiki-container js-dk-wiki is-right">
                                    <div class="wiki-arrow"></div>
                                    <p class="wiki-text">
                                    هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده
                                    متفاوت باشد. در
                                    صورتی که هر
                                    یک از مرسولات حداقل ارزشی برابر با ۱۰۰هزار تومان داشته باشد،
                                    آن مرسوله
                                    بصورت رایگان
                                    ارسال می‌شود.<br>
                                    "حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر
                                    باشد."
                                    </p>
                                </div>
                            </span>
                            </span>
                        </li>
                    @endif
                </ul>
                <div class="checkout-summary-devider">
                    <div></div>
                </div>
                <div class="checkout-summary-content">
                    @if(isset($theAmountPayable) && !empty($theAmountPayable))
                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                        <div class="checkout-summary-price-value">
                            <div class="price-for-pay">
                                {!! $theAmountPayable !!}
                            </div>
                            <span class="checkout-summary-price-value-amount">
                            </span>
                        </div>
                    @endif

                    @if(isset($finish) && $finish == 0)
                        @if(\Illuminate\Support\Facades\Route::currentRouteName() == "site.basket.checkout.review")
                                <form action="{{route('site.basket.finish')}}" method="post">
                                    <input type="hidden" name="postType" value="{{ $postType }}">
                                    <input type="hidden" name="payment" value="{{ \App\Utility\paymentMethods::ONLINE }}">
                                    <input type="hidden" name="shipping-method" value="173">
                                    @csrf
                                    <button class="dk-btn dk-btn-info" type="submit">
                                        پرداخت
                                        <i class="now-ui-icons shopping_basket"></i>
                                    </button>
                                </form>
                            @else
                                @if(reset($basket->items)['type'] == \App\Utility\ProductType::SIMPLE)
                                    <a href="{{$nextUrl}}"
                                       class="selenium-next-step-shipping form-account">
                                        <div class="parent-btn">
                                            <button class="dk-btn dk-btn-info">
                                                ادامه ثبت سفارش
                                                <i class="now-ui-icons shopping_basket"></i>
                                            </button>
                                        </div>
                                    </a>
                                @else
                                    @include('generals.allErrors')
                                    <form action="{{route('site.basket.finish')}}" method="post">
                                        <input type="hidden" name="postType"
                                               value="{{ \App\Model\ShippingCost::TYPES_OF_POST['digital'] }}">
                                        @csrf
                                        <input value="{{\App\Utility\paymentMethods::ONLINE}}" type="hidden"
                                               name="payment">
                                        <input value="174" type="hidden" name="shipping-method">

                                        <button class="dk-btn dk-btn-info" type="submit">
                                            پرداخت
                                            <i class="now-ui-icons shopping_basket"></i>
                                        </button>
                                    </form>
                                @endif
                        @endif
                    @else
                        <br>
                    @endif
                    <div>
                                            <span>
                                                کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی
                                                را تکمیل
                                                کنید.
                                            </span>
                        <span class="wiki wiki-holder"><span class="wiki-sign"></span>
                                                <div class="wiki-container is-right">
                                                    <div class="wiki-arrow"></div>
                                                    <p class="wiki-text">
                                                        محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش
                                                        برای شما رزرو
                                                        می‌شوند. در
                                                        صورت عدم ثبت سفارش، تاپ کالا هیچگونه مسئولیتی در قبال تغییر
                                                        قیمت یا موجودی
                                                        این کالاها
                                                        ندارد.
                                                    </p>
                                                </div>
                                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-feature-aside">
            <ul>
                <li class="checkout-feature-aside-item checkout-feature-aside-item-guarantee">
                    هفت روز
                    ضمانت تعویض
                </li>
                <li class="checkout-feature-aside-item checkout-feature-aside-item-cash">
                    پرداخت در محل با
                    کارت بانکی
                </li>
                <li class="checkout-feature-aside-item checkout-feature-aside-item-express">
                    تحویل اکسپرس
                </li>
            </ul>
        </div>
    </div>
</aside>
