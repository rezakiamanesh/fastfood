@extends('panel.layout.master')

@section('top-menu')
    @include('panel.layout.partials.topNav')
@stop

@section('right-menu')
    @include('panel.layout.partials.rightNav')
@stop

@section('content')

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ isset($title) ? $title : "" }}
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

                </div>
                <div class="body">
                    <div class="table-responsive">
                        @if (isset($exams) && count($exams) > 0)
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">نام کاربر</th>
                                    <th class="text-center"> وضعیت</th>
                                    <th class="text-center">تاریخ</th>
                                    <th class="text-center"> عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($exams as $val)
                                    <tr>
                                        <td class="text-center"> {{ $loop->iteration  }} </td>
                                        <td class="text-center"> {{ $val->name }} </td>
                                        <td class="text-center">
                                            <a @can('panel.exam.status') href="{{ route('panel.exam.status' , ['id' => $val->id])  }}" @endcan>
                                                {{ \App\Utility\Status::getStatus($val->status) }}
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            {{ $val->created_at }}
                                        </td>


                                        <td class="text-center">

                                            @can('panel.exam.modalDetails')
                                                <button type="button"
                                                        class="btn btn-info btn-circle waves-effect waves-circle waves-float"
                                                        data-toggle="modal" data-target="#detailsModel{{$val->id}}">
                                                    <i class="material-icons">search</i>
                                                </button>
                                            @endcan

                                            @can('panel.exam.delete')
                                                <button type="button"
                                                        class="btn btn-danger btn-circle waves-effect waves-circle waves-float"
                                                        data-toggle="modal" data-target="#deleteModel{{$val->id}}">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            @endcan

                                        </td>
                                    </tr>

                                    {{-- modal details --}}
                                    <div class="modal fade" id="detailsModel{{$val->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">جزییات!</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <hr>
                                                    <p> تصاویر / فایل ها : </p>
                                                    <br>
                                                    <ul>
                                                        @if(isset($val->video[0]) && !empty($val->video[0]))
                                                                <li><a href="{{ asset("public/storage/".$val->video[0]->url) }}"
                                                                            target="_blank">
                                                                    نمایش فایل</a></li>
                                                        @endif
                                                    </ul>

                                                    <p> نام کاربر : <span> {{ $val->name }} </span>
                                                        <br>
                                                        {!! $val->description !!}
                                                    </p>
                                                    <span class="btn btn-warning">موبایل : {{ $val->mobile }}</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect"
                                                            data-dismiss="modal">انصراف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal details --}}

                                    {{-- modal delete --}}
                                    <div class="modal fade" id="deleteModel{{$val->id}}" tabindex="-1"
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
                                                            action="{{ route('panel.exam.delete' , ['id' => $val->id])  }}"
                                                            method="post">
                                                        @csrf
                                                        {{ method_field('DELETE')  }}
                                                        <button type="submit" class="btn btn-danger waves-effect">حذف
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

                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">نام</th>
                                    <th class="text-center"> وضعیت</th>
                                    <th class="text-center">تاریخ</th>
                                    <th class="text-center"> عملیات</th>
                                </tr>
                                </tfoot>

                            </table>

                        @else
                            <p class="alert alert-info text-center"> رکوردی یافت نشد. </p>
                        @endif
                        <div class="container">

                            <div class="pull-left">
                                {{--                                @if(isset($exams) && $exams->count() > 0)--}}
                                {{--                                    <span style="margin-right: 45%">{!! $exams->render() !!}</span>--}}
                                {{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->


@stop

