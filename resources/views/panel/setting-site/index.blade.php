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

                        @can('panel.setting.store')
                            <div class="pull-left margin-5">
                                <a href="#"
                                   data-toggle="modal" data-target="#detailsModel"
                                   class="btn btn-outline-default btn-border-radius"> ایجاد تنظیم جدید </a>
                            </div>
                        @endcan
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
                        @if (isset($systmeinf) && count($systmeinf) > 0)
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>توضیحات</th>
                                    <th> عملیات</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($systmeinf as $val)

                                    <tr>
                                        <td> {{ $loop->iteration  }} </td>
                                        <td> {{ isset($val->name) ?  $val->name : null }} </td>
                                        <td> {{ isset($val->description) ?  $val->description : null }} </td>

                                        <td>
                                            @can('panel.manage.index')
                                                <a href="{{route('panel.manage.index' , ['id' => $val->id])}}"
                                                   class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">search</i>
                                                </a>
                                            @endcan

                                            @can('panel.setting.edit')
                                                <button type="button"
                                                        class="btn btn-warning btn-circle waves-effect waves-circle waves-float"
                                                        data-toggle="modal" data-target="#editModel{{$val->id}}">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            @endcan

                                            @can('panel.setting.delete')
                                                <button type="button"
                                                        class="btn btn-danger btn-circle waves-effect waves-circle waves-float"
                                                        data-toggle="modal" data-target="#deleteModel{{$val->id}}">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            @endcan
                                        </td>
                                    </tr>

                                    {{-- delete --}}
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
                                                    <form action="{{ route('panel.setting.delete' , ['id' => $val->id])  }}"
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

                                    {{-- edit --}}
                                    <div class="modal fade" id="editModel{{$val->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ویرایش</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('panel.setting.update' , ['id' => $val->id])  }}"
                                                          method="post">
                                                        @csrf
                                                        {{ method_field('PATCH')  }}
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                   value="{{ $val->name }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                   value="{{ $val->description }}"
                                                                   name="description">
                                                        </div>

                                                        <button type="submit" class="btn btn-warning waves-effect pull-right">ویرایش
                                                        </button>
                                                        <button type="button" class="btn btn-default waves-effect pull-left"
                                                                data-dismiss="modal">انصراف
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>توضیحات</th>
                                    <th> عملیات</th>
                                </tr>
                                </tfoot>

                            </table>

                        @else
                            <p class="alert alert-info text-center"> رکوردی یافت نشد. </p>
                        @endif
                        {{-- detail --}}
                        <div class="modal fade" id="detailsModel" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">جزییات</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('panel.setting.store')}}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="نام تنظیم..." required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       placeholder="توضیحات مربوط به تنظیم"
                                                       name="description">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-round">ذخیره</button>
                                            <button type="button" class="btn btn-default waves-effect pull-left"
                                                    data-dismiss="modal">انصراف
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="pull-left">
{{--                                @if(isset($systmeinf) && $systmeinf->count() > 0)--}}
{{--                                    <span style="margin-right: 45%">{!! $systmeinf->render() !!}</span>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
