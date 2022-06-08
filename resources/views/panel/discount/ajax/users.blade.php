<div class="row clearfix morph" id="product">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="status">@lang('cms.users')</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <select id="select2-multiple" class="form-control select-option js-example-basic-multiple "  name="discountable_id[]" multiple>
            <option value="">@lang('cms.choose')</option>
            @if (isset($AllUser) && $AllUser->count() >0)
                @foreach($AllUser as  $key => $value)
                    <option value="{{ $value->id }}" {{ isset($data) && in_array($value->id,$data) ? 'selected' : '' }}>{{ $value->name }}-{{ $value->mobile }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>


