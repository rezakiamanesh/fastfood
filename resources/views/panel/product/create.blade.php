@extends('panel.layout.master')

@section('top-menu')
    @include('panel.layout.partials.topNav')
@stop

@section('right-menu')
    @include('panel.layout.partials.rightNav')
@stop

@section('content')

    <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ isset($title) ? $title : "" }}
                        <div class="pull-left margin-5">
                            @can('panel.product.index')
                                <a href="{{ route('panel.product.index')  }}"
                                   class="btn btn-outline-default btn-border-radius"> لیست محصولات </a>
                            @endcan
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
                                @can('panel.product.index')
                                    <li>
                                        <a href="{{ route('panel.product.index')  }}" style="font-size: 10px">لیست
                                            محصولات </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    @include('generals.allErrors')
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation">
                            <a href="#base" data-toggle="tab" class="active show"> اطلاعات پایه </a>
                        </li>
                        <li role="presentation">
                            <a href="#gallery" data-toggle="tab"> گالری تصاویر </a>
                        </li>
                    </ul>
                    @if(isset($findIdProducts))
                        <form class="form-horizontal" method="post"
                              action="{{ route('panel.product.update',$findIdProducts->id)  }}">
                            {{ method_field("PATCH") }}
                            @else
                                <form class="form-horizontal" method="post"
                                      action="{{ route('panel.product.store')  }}">
                                    @endif

                                    @csrf

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="base">
                                            @include('panel.product.partials.basic')
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="gallery">
                                            @include('panel.product.partials.gallery')
                                        </div>

                                        @if (isset($findIdProducts) && !empty($findIdProducts) && !is_null($findIdProducts))
                                            @can('panel.product.update')
                                                {{-- button edit --}}
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-7 ">
                                                        <button type="submit" class="btn-hover color-4 pull-left">ویرایش
                                                        </button>
                                                    </div>
                                                </div>
                                            @endcan
                                        @else
                                            @can('panel.product.store')
                                                {{-- button save --}}
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-7 ">
                                                        <button type="submit" class="btn-hover color-1 pull-left">ذخیره
                                                        </button>
                                                    </div>
                                                </div>
                                            @endcan
                                        @endif
                                    </div>

                                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Horizontal Layout -->

@stop
@section('admin-js')
    @include('panel.layout.ckjs')

    <script>
        $(document).ready(function () {
            var plusImage = $('#plusImage');
            var minImage = $('#minImage');
            var result = $('.resultGalleryImage');
            var count = 5;

            /* add image */
            plusImage.click(function (e) {
                count++;
                e.preventDefault();
                result.append("<div id='gallery' data-att='" + count + "' class=\"form-group \">\n" +
                    "                    <label for=\"images\" class=\"control-label col-lg-2\">تصویر\n" +
                    "                    </label>\n" +
                    "                    <div class=\"col-md-6\">\n" +
                    "                        <div class=\"input-group\">\n" +
                    "                            <span class=\"input-group-btn\">\n" +
                    "                                                    <a data-input=\"thumbnail" + count + "\" data-preview=\"holder" + count + "\"\n" +
                    "                                                       class=\"lfm btn btn-primary\">\n" +
                    "                                                      <i class=\"fa fa-picture-o\"></i> انتخاب کنید\n" +
                    "                                                    </a>\n" +
                    "                                                  </span>\n" +
                    "                            <input id=\"thumbnail" + count + "\" class=\"form-control\" type=\"text\"\n" +
                    "                                   name=\"filepath[]\">\n" +
                    "                        </div>\n" +
                    "                    </div>\n" +
                    "<div class=\"col-md-3\">" +
                    "<span id=\"minImage\" data-attrss=\"" + count + "\" class=\"btn btn-xs btn-danger\">-</span>" +
                    "</div>" +
                    "                    <br>\n" +
                    "<div class=\"col-md-11 text-center\">" +
                    "                    <img  id=\"holder" + count + "\" style=\"margin-top:15px;max-height:100px;\">\n" +
                    "</div>" +
                    "                </div>");


                $('.lfm').filemanager('image', "", "{{env('APP_URL')}}");


                /* remove each input splity */
                $('span').click(function () {
                    var id = $(this).attr('data-attrss');
                    var myDiv = $('div[data-att="' + id + '"]').remove();
                });

            });

            /* delete image */
            minImage.click(function (e) {
                e.preventDefault();
                $('#gallery:last-child').remove();
            });

            /* when edit product mode */

            @if(isset($findIdProducts) && !empty($findIdProducts) && count($findIdProducts->image) > 2)
            var count = 5;
            @foreach($findIdProducts->image as $key => $itemImages)
                    @if($itemImages->url != null && $key > 1 )
                count++;
            result.append("<div id='gallery' data-att= " + count + "  class=\"form-group \">\n" +
                "                    <label for=\"images\" class=\"control-label col-lg-2\">تصویر\n" +
                "                    </label>\n" +
                "                    <div class=\"col-md-6\">\n" +
                "                        <div class=\"input-group\">\n" +
                "                            <span class=\"input-group-btn\">\n" +
                "                                                    <a data-input=\"thumbnail" + count + "\" data-preview=\"holder" + count + "\"\n" +
                "                                                       class=\"lfm btn btn-primary\">\n" +
                "                                                      <i class=\"fa fa-picture-o\"></i> انتخاب کنید\n" +
                "                                                    </a>\n" +
                "                                                  </span>\n" +
                "                            <input value=\" {{$itemImages->url}} \" id=\"thumbnail" + count + "\" class=\"form-control\" type=\"text\"\n" +
                "                                   name=\"filepath[]\">\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "<div class=\"col-md-3\">" +
                "<span  data-attrss=\"" + count + "\" class=\"btn btn-xs btn-danger minImageEx\">-</span>" +
                "</div>" +
                "                    <br>\n" +
                "<div class=\"col-md-11 text-center\">" +
                "                    <img src=\" {{$itemImages->url}} \" id=\"holder" + count + "\" style=\"margin-top:15px;max-height:100px;\">\n" +
                "</div>" +
                "                </div>");
            $('.lfm').filemanager('image', "", "{{env('APP_URL')}}");


            /* remove each input splity */
            $('span').click(function () {
                var id = $(this).attr('data-attrss');
                var myDiv = $('div[data-att="' + id + '"]').remove();
            });

            @endif
            @endforeach
            @endif

        });
    </script>

@endsection
