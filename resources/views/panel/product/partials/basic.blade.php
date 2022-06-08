<div class=" mt-5">

    {{-- title --}}
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="title">عنوان
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input class="form-control"
                           value="{{isset($findIdProducts)  ? $findIdProducts->title : old('title') }}"
                           id="title" name="title" minlength="2" type="text"
                           required/>
                </div>
            </div>
        </div>
    </div>

    {{-- image --}}
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="status">تصویر شاخص
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="">
                                        <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail2" data-preview="holder2"
                                           class="btn btn-primary">
                                          <i class="fa fa-picture-o"></i> انتخاب
                                        </a>
                                      </span>
                    <input id="thumbnail2" class="form-control" type="text"
                           name="filepath[]"
                           value="{{ !empty($findIdProducts->image)  ? $findIdProducts->image[0]->url : null }}">
                </div>
                <img id="holder2" style="margin-top:15px;max-height:100px;">
                @if(isset($findIdProducts) && count($findIdProducts->image) > 0 && isset($findIdProducts->image[0]))
                    <img src="{{  $findIdProducts->image[0]->url  }}"
                         id="holder2"
                         style="margin-top:15px;max-height:100px;">
                @endif
            </div>
        </div>
    </div>

    {{-- body --}}
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="title">توضیحات
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                                                <textarea required name="description" id="description" cols="30"
                                                          class="form-control ckeditor"
                                                          rows="10">{{isset($findIdProducts)  ? $findIdProducts->description : old('description') }}</textarea>
                </div>
            </div>
        </div>
    </div>


    {{-- category --}}
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="status">دسته بندی
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="">
                    <select required name="category_id"
                            class="form-group col-lg-4 select-option categorySelect js-example-basic-multiple">
                        <option value="">انتخاب کنید</option>

                        @if(isset($allCategoryProducts) && !empty($allCategoryProducts))
                            @foreach($allCategoryProducts as $item)

                                @if (request()->old('category_id') == $item->id)
                                    <option value="{{ $item->id }}"
                                            selected>{{ $item->title }}</option>
                                @else
                                    <option name="category_id"
                                            value="{{$item->id}}"
                                            {{ isset($findIdProducts,$findIdProducts->categories[0]) && !empty($findIdProducts) && $item->id == $findIdProducts->categories[0]->id ? "selected" : null  }}
                                    >{{$item->title}}</option>
                                @endif

                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="price">قیمت
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input class="form-control"
                           value="{{isset($findIdProducts)  ? $findIdProducts->price : old('price') }}"
                           id="price" name="price" minlength="2" type="text"
                           />
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="stock">موجودی
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input class="form-control"
                           value="{{isset($findIdProducts)  ? $findIdProducts->stock : old('stock') }}"
                           id="stock" name="stock" minlength="2" type="text"
                           required/>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="time_to_prepare">مدت زمان برای آماده شدن(دقیقه)
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input class="form-control"
                           value="{{isset($findIdProducts)  ? $findIdProducts->time_to_prepare : old('time_to_prepare') }}"
                           id="time_to_prepare" name="time_to_prepare" minlength="2" type="text"
                           required/>
                </div>
            </div>
        </div>
    </div>



    {{-- status --}}
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="status">وضعیت
                <span class="redAlert">*</span>
            </label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="">
                    <select name="status" class="form-group select-option" id="">
                        @foreach(\App\Utility\Status::Status() as $key => $value)
                            <option
                                    value="{{$key}}" {{ isset($findIdProducts) && $key == $findIdProducts->status ? 'selected' : null }} >{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>
