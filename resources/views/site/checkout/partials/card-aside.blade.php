<aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2">
    <div class="checkout-aside">
        <div class="checkout-summary">
            <div class="checkout-summary-main">
                <ul class="checkout-summary-summary">
                    @if(isset($basket) && !empty($basket))
                        <li>
                            <span>مبلغ کل </span><span
                                class="total-price">{{ number_format($basket['totalPrice'])." تومان " }}</span>
                        </li>
                    @endif

                </ul>
                <div class="checkout-summary-devider">
                    <div></div>
                </div>
                <div class="checkout-summary-content">
                    <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                    <div class="checkout-summary-price-value">
                        <div class="price-for-pay">
                            {{ number_format($basket['totalPrice'])." تومان " }}
                        </div>
                        <span class="checkout-summary-price-value-amount">
                            </span>
                    </div>
                    @if(\Illuminate\Support\Facades\Route::currentRouteName() == "site.checkout")
                        <form action="{{route('site.basketStore')}}" method="post">
                            @csrf
                            <button class="dk-btn dk-btn-info" type="submit">
                                پرداخت
                                <i class="now-ui-icons shopping_basket"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{$nextUrl}}"
                           class="selenium-next-step-shipping form-account">
                            <div class="parent-btn">
                                <button class="dk-btn dk-btn-info">
                                    ادامه ثبت سفارش
                                    <i class="now-ui-icons shopping_basket"></i>
                                </button>
                            </div>
                        </a>
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
