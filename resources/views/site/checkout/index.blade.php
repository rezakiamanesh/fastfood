@extends('site.layouts.master')
@section('site-css')
    @include('users.layouts.partials.styles')
@endsection
@section('title',$title)

@section('content')
    @php
        $finish = 0;
        $nextUrl = route('site.address');
    @endphp
    <main class="cart-page default" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="container">
            <div class="row pb-5">
                <div class="col-xl-9 col-lg-8 col-md-12">
                    @if(isset($basket) && !empty($basket))
                        <div class="cart-page-content col-xl-12 col-lg-8 col-md-12 order-1">
                            <div class="cart-page-title">
                                <h1>سبد خرید</h1>
                            </div>
                            <livewire:basket :basket="$basket">
                        </div>
                        <div class="cart-page-content col-xl-12 col-lg-8 col-md-12 order-1">
                            <div class="checkout-price-options">
                                <div class="checkout-price-options-form">
                                    <section class="checkout-price-options-container">
                                        <div class="checkout-price-options-header">
                                            <span>استفاده از کد تخفیف </span>
                                        </div>
                                        <div class="checkout-price-options-content">
                                            <p class="checkout-price-options-description">
                                                با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می&zwnj;شود.
                                            </p>
                                            <div class="checkout-price-options-row">
                                                <div class="checkout-price-options-form-field">
                                                    <label class="ui-input">
                                                        <input class="ui-input-field coupon_input val-coupon"
                                                               type="text" placeholder="مثلا 837A2CS">
                                                    </label>
                                                </div>
                                                <div class="checkout-price-options-form-button">
                                                    <button type="button" class="btn-primary coupon">
                                                        ثبت کد تخفیف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                </div>
                @include('site.checkout.partials.card-aside')
                @else
                    <p> @lang('cms.empty-basket') </p>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('site-js')
    {{--    --}}{{-- start add to basket--}}
    {{--    <script>--}}
    {{--        $('.addProduct').on('click', function (e) {--}}
    {{--            e.preventDefault();--}}
    {{--            var addProduct = $(this).attr('data-attr-add');--}}
    {{--            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
    {{--            $.ajax({--}}
    {{--                type: "post",--}}
    {{--                url: "{{route('site.insertFromBasket')}}",--}}
    {{--                data: {--}}
    {{--                    variationID: addProduct,--}}
    {{--                    _token: CSRF_TOKEN--}}
    {{--                },--}}

    {{--                success: function (data) {--}}
    {{--                    if (data.status == 403) {--}}
    {{--                        Swal.fire({--}}
    {{--                            title: "خطا!",--}}
    {{--                            text: "لطفا ابتدا وارد حساب کاربری خود شوید.",--}}
    {{--                            icon: "error",--}}
    {{--                            button: "تایید",--}}
    {{--                        });--}}
    {{--                    }--}}

    {{--                    if (data.status == 404) {--}}
    {{--                        Swal.fire({--}}
    {{--                            title: "خطا!",--}}
    {{--                            text: "محصولی با این مشخصه یافت نشد.",--}}
    {{--                            icon: "error",--}}
    {{--                            button: "تایید",--}}
    {{--                        });--}}
    {{--                    }--}}

    {{--                    if (data.status == 102) {--}}
    {{--                        Swal.fire({--}}
    {{--                            title: "خطا!",--}}
    {{--                            text: "موجودی محصول برای تعداد انتخابی شما کافی نمی باشد.",--}}
    {{--                            icon: "error",--}}
    {{--                            button: "تایید",--}}
    {{--                        });--}}
    {{--                    }--}}

    {{--                    if (data.status == 200) {--}}

    {{--                        Swal.fire({--}}
    {{--                            title: "موفقیت آمیز!",--}}
    {{--                            text: "محصول مورد نظر به سبد خرید شما اضافه شد.",--}}
    {{--                            icon: "success",--}}
    {{--                            showCancelButton: false,--}}
    {{--                            closeOnConfirm: false,--}}
    {{--                            showLoaderOnConfirm: false,--}}
    {{--                            confirmButtonClass: "btn-danger",--}}
    {{--                            confirmButtonText: "بستن",--}}
    {{--                        }).then(function () {--}}
    {{--                            location.reload();--}}
    {{--                        });--}}
    {{--                    }--}}
    {{--                    // $(".cart").load(" .cart > *");--}}

    {{--                },--}}
    {{--                error: function (error) {--}}
    {{--                    //alert(error);--}}
    {{--                    alert("لطفا چند لحظه دیگر وارد شوید.");--}}
    {{--                }--}}
    {{--            });--}}
    {{--        })--}}
    {{--    </script>--}}
    {{--    --}}{{-- end add to basket--}}

    {{--    --}}{{-- start delete from basket --}}
    {{--    <script>--}}

    {{--        $('.minProduct').on('click', function (e) {--}}
    {{--            e.preventDefault();--}}
    {{--            /* id product in session */--}}
    {{--            var variationID = $(this).attr('data-attr-min');--}}
    {{--            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

    {{--            $.ajax({--}}
    {{--                type: "post",--}}
    {{--                url: "{{route('site.deleteFromBasket')}}",--}}
    {{--                data: {--}}
    {{--                    variation_id: variationID,--}}
    {{--                    _token: CSRF_TOKEN--}}
    {{--                },--}}

    {{--                success: function (data) {--}}
    {{--                    console.log(data);--}}

    {{--                    if (data.status == 100) {--}}
    {{--                        Swal.fire({--}}
    {{--                            title: "خطا!",--}}
    {{--                            text: "محصولی با این مشخصه یافت نشد.",--}}
    {{--                            icon: "error",--}}
    {{--                            button: "تایید",--}}
    {{--                        });--}}
    {{--                    }--}}

    {{--                    if (data.status == 200) {--}}

    {{--                        Swal.fire({--}}
    {{--                            title: "موفقیت آمیز!",--}}
    {{--                            text: "محصول مورد نظر از سبد خرید شما حذف شد",--}}
    {{--                            icon: "success",--}}
    {{--                            showCancelButton: false,--}}
    {{--                            closeOnConfirm: false,--}}
    {{--                            showLoaderOnConfirm: false,--}}
    {{--                            confirmButtonClass: "btn-danger",--}}
    {{--                            confirmButtonText: "بستن",--}}
    {{--                        }).then(function () {--}}
    {{--                            location.reload();--}}
    {{--                        });--}}
    {{--                    }--}}

    {{--                    // location.reload();--}}

    {{--                    // $(".cart").load(" .cart > *");--}}

    {{--                },--}}
    {{--                error: function (error) {--}}
    {{--                    //alert(error);--}}
    {{--                    alert("لطفا چند لحظه دیگر وارد شوید.");--}}
    {{--                }--}}
    {{--            });--}}
    {{--        })--}}

    {{--    </script>--}}
    {{-- end delete from basket --}}

@endsection
