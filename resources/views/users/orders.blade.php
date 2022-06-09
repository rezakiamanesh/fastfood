@extends('site.layouts.master')
@section('site-css')
    @include('users.layouts.partials.styles')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
@endsection
@section('content')
    <main class="profile-user-page default">
        <div class="container wrapper default">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">همه سفارش ها</h1>
                            </div>
                            <div class="content-section default">
                                @if(isset($orders) && count($orders) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-order">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">نام</th>
                                                <th scope="col">کد پیگیری</th>
                                                <th scope="col">مبلغ</th>
                                                <th scope="col">وضعیت</th>
                                                <th scope="col">تاریخ سفارش</th>
                                                <th scope="col">زمان آماده سازی</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $order->orderItem[0]->product->title }}</td>
                                                    <td>{{ $order->tracking_code}}</td>
                                                    <td>{{ number_format($order->total_amount)." تومان " }}</td>
                                                    <td>{{ \App\Utility\Status::getStatus($order->status) }}</td>
                                                    <td dir="ltr">{{ $order->created_at }}</td>
                                                    <td dir="ltr">{{ \Carbon\Carbon::create($order->created_at)->addMinute($order->orderItem[0]->product->time_to_prepare) }}</td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                @else
                                    <div class="text-center">شما تا به حال خریدی انجام نداده اید!</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @include('users.layouts.partials.aside-menu')
            </div>
        </div>
    </main>
@endsection
