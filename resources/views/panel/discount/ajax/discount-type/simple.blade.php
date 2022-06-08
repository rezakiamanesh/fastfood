<div class="row clearfix alltype">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="status">@lang('cms.discount-on')</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <select class="form-control type select-option"
                name="discountable_type">
            <option value="">@lang('cms.choose-type-discount')</option>
            @foreach(App\Utility\DiscountType::DiscountONEach(null,'simple') as $key=> $value)
                <option value="{{ $key }}"  {{ isset($typeOn) ? App\Utility\DiscountType::SelectedDiscountType($key,$typeOn) : '' }} >{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>


