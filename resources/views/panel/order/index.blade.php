@extends('panel.layout.master')

@section('top-menu')
    @include('panel.layout.partials.topNav')
@stop

@section('right-menu')
    @include('panel.layout.partials.rightNav')
@stop

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ isset($title) ? $title : "" }}
                        <div class="pull-left margin-5">
                        </div>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                               role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="{{ route('panel.dashboard.index')  }}">داشبورد</a>
                                </li>

                            </ul>
                        </li>
                    </ul>

                    <hr>
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <form class="form-inline" role="form" action="{{ route('user.order-search') }}"
                                      method="get">

                                    <div class="form-group col-md-6 box_date">
                                        <label for="title" class="control-label col-lg-2">از تاریخ</label>
                                        <input disabled
                                               value="{{ old('start_date') }}"
                                               id="datepicker1" name="start_date"
                                               class="form-control expire_date_value start_date"
                                               type="text">
                                    </div>
                                    <div class="form-group col-md-6 box_date">
                                        <label for="title" class="control-label col-lg-2">تا تاریخ</label>
                                        <input disabled
                                               value="{{ old('end_date') }}"
                                               id="datepicker1" name="end_date"
                                               class="form-control expire_date_value end_date"
                                               type="text">
                                    </div>

                                    {{-- tracking_code --}}
                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="tracking_code">کد پیگیری</label>
                                        <input type="text" class="form-control" id="tracking_code"
                                               name="tracking_code"
                                               placeholder="کد پیگیری مورد نظر را وارد نمایید">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="status">وضعیت</label>
                                        <select name="status" id="status">
                                            <option value="">همه</option>
                                            @foreach(\App\Utility\Status::eachStatusOrder() as $key => $itemStatus)
                                                <option value="{{ $key }}"> {{ $itemStatus }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- name --}}
                                    <div class="form-group col-md-6">
                                        <label class="sr-only" for="status">نام خریدار</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="نام خریدار">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="date" name="date-enable">
                                            <span class="form-check-sign"></span>
                                        </label>
                                        <label for="date">فعال کردن تاریخ</label>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-success">جستجو</button>

                                    </div>


                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        @if (isset($orders) && count($orders) > 0)
                            <form class="form-inline" role="form" action="{{ route(Route::currentRouteName()) }}"
                                  method="get"
                                  id="numberOfPaginate" name="numberOfPaginate">
                                <div class="col-1">
                                    <select name="number" id="number" style="height:25px;font-size:13px"
                                            onchange="changeNumberOfPaginate()">
                                        <option
                                            value="10" {{ isset(request()->number) && !empty(request()->number) && request()->number == 10 ? 'selected' : null }}>
                                            10
                                        </option>
                                        <option
                                            value="20" {{ isset(request()->number) && !empty(request()->number) && request()->number == 20 ? 'selected' : null }}>
                                            20
                                        </option>
                                        <option
                                            value="30" {{ isset(request()->number) && !empty(request()->number) && request()->number == 30 ? 'selected' : null }}>
                                            30
                                        </option>
                                        <option
                                            value="40" {{ isset(request()->number) && !empty(request()->number) && request()->number == 40 ? 'selected' : null }}>
                                            40
                                        </option>
                                        <option
                                            value="50" {{ isset(request()->number) && !empty(request()->number) && request()->number == 50 ? 'selected' : null }}>
                                            50
                                        </option>
                                        <option
                                            value="60" {{ isset(request()->number) && !empty(request()->number) && request()->number == 60 ? 'selected' : null }}>
                                            60
                                        </option>
                                        <option
                                            value="70" {{ isset(request()->number) && !empty(request()->number) && request()->number == 70 ? 'selected' : null }}>
                                            70
                                        </option>
                                        <option
                                            value="80" {{ isset(request()->number) && !empty(request()->number) && request()->number == 80 ? 'selected' : null }}>
                                            80
                                        </option>
                                        <option
                                            value="90" {{ isset(request()->number) && !empty(request()->number) && request()->number == 90 ? 'selected' : null }}>
                                            90
                                        </option>
                                        <option
                                            value="100" {{ isset(request()->number) && !empty(request()->number) && request()->number == 100 ? 'selected' : null }}>
                                            100
                                        </option>

                                    </select>
                                </div>
                            </form>
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                <tr>
                                    <th class="no-sort text-center">
                                        &nbsp;<label class="form-check-label">
                                            <input type="checkbox" name="select-all" id="select-all" value=""/>
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </th>
                                    <th scope="col">نام</th>
                                    <th scope="col">کد پیگیری</th>
                                    <th scope="col">مبلغ</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ سفارش</th>
                                    <th scope="col">زمان آماده سازی</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $itemOrder)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $itemOrder->orderItem[0]->product->title }}</td>
                                            <td>{{ $itemOrder->tracking_code}}</td>
                                            <td>{{ number_format($itemOrder->total_amount)." تومان " }}</td>
                                            <td>{{ \App\Utility\Status::getStatus($itemOrder->status) }}</td>
                                            <td dir="ltr">{{ $itemOrder->created_at }}</td>
                                            <td dir="ltr">{{ \Carbon\Carbon::create($itemOrder->created_at)->addMinute($itemOrder->orderItem[0]->product->time_to_prepare) }}</td>
                                        </tr>
                                    @can('panel.order.delete')
                                        {{-- modal delete --}}
                                        <div class="modal fade" id="deleteModel{{$itemOrder->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">هشدار!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        آیا از حذف آیتم مورد نظر اطمینان دارین؟
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('panel.order.delete',$itemOrder->id) }}"
                                                            method="post">
                                                            @csrf
                                                            {{ method_field('DELETE')  }}
                                                            <button type="submit" class="btn btn-danger waves-effect">
                                                                حذف
                                                            </button>
                                                        </form>

                                                        <button type="button" class="btn btn-default waves-effect"
                                                                data-dismiss="modal">انصراف
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- modal delete --}}
                                    @endcan
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="no-sort text-center">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="select-all" id="select-all" value=""/>
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </th>
                                    <th scope="col">نام</th>
                                    <th scope="col">کد پیگیری</th>
                                    <th scope="col">مبلغ</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ سفارش</th>
                                    <th scope="col">زمان آماده سازی</th>
                                </tr>
                                </tfoot>

                            </table>

                        @else
                            <p class="alert alert-info text-center"> رکوردی یافت نشد. </p>
                        @endif
                        <div class="container">
                            <div class="pull-left">
                                @if(isset($orders) && $orders->count() > 0)
                                    <span
                                        style="margin-right: 45%">{{ $orders->appends(request()->query())->links() }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('admin-js')
    <script>
        function changeNumberOfPaginate() {
            var number = $("#number").val();
            setGetParameter('number', number);
        }

        function setGetParameter(paramName, paramValue) {
            var url = window.location.href;
            var hash = location.hash;
            url = url.replace(hash, '');
            if (url.indexOf(paramName + "=") >= 0) {
                var prefix = url.substring(0, url.indexOf(paramName + "="));
                var suffix = url.substring(url.indexOf(paramName + "="));
                suffix = suffix.substring(suffix.indexOf("=") + 1);
                suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
                url = prefix + paramName + "=" + paramValue + suffix;
            } else {
                if (url.indexOf("?") < 0)
                    url += "?" + paramName + "=" + paramValue;
                else
                    url += "&" + paramName + "=" + paramValue;
            }
            window.location.href = url + hash;
        }

        $('#select-all').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });



    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".start_date").persianDatepicker({
                format: 'YYYY/MM/DD H:m:s',
                // initialValue: false,
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });
            $(".end_date").persianDatepicker({
                format: 'YYYY/MM/DD H:m:s',
                // initialValue: false,
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });
            $('#date').on('click', function () {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                    $('.box_date').find('input').prop('disabled', false);
                } else {
                    $(this).val(0);
                    $('.box_date').find('input').prop('disabled', true);
                }
            });
        });


    </script>
@endsection
