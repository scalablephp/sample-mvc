{!! Form::open(array('method' => 'patch','class' => 'uk-form-stacked','action' => ['Admin\GeoProvinceController@update',$province->GeoProvinceId],'id' => 'province_form')) !!}
    {{ Form::hidden('_pname',$province->NameEn,['id' => '_pname']) }}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <label>{{ __('province_name') }}</label>
                <input type="text" name="pname" id="pname" class="md-input" value="{{ $province->NameEn }}" required/>
            </div>
            <div class="uk-form-row">
                <label>{{ __('sort_order') }}</label>
                <input type="text" name="sortid" id="sortid" class="md-input" value="{{ $province->SortID }}"/>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1 uk-text-right">
            <button type="submit" class="md-btn md-btn-primary" data-style="zoom-in">{{ __('submit') }}</button>
        </div>
    </div>
{!! Form::close() !!}