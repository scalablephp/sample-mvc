{!! Form::open(array('method' => 'patch','class' => 'uk-form-stacked','action' => ['Admin\GeoMunicipalityController@update',$municipality->GeoMunicipalityId],'id' => 'municipality_form')) !!}
    {{ Form::hidden('_mname',$municipality->NameEn,['id' => '_mname']) }}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <label>{{ __('export_prov') }}</label>
                {{ Form::select('_provid', $province, $municipality->GeoProvinceId, ['class' => 'md-input','id' => '_provid']) }}
            </div>
            <div class="uk-form-row">
                <label>{{ __('muncplt_name') }}</label>
                <input type="text" name="mname" id="mname" class="md-input" value="{{ $municipality->NameEn }}" required/>
            </div>
            <div class="uk-form-row">
                <label>{{ __('sort_order') }}</label>
                <input type="text" name="sortid" id="sortid" class="md-input" value="{{ $municipality->SortID }}"/>
            </div>
            <div class="uk-form-row">
                <p>
                    <label for="publish" class="inline-label">{{ __('Publish') }}:&nbsp;</label>
                    <input type="checkbox" name="publish" id="publish" data-md-icheck @if($municipality->IsPublished == "1") checked @endif/>
                </p>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1 uk-text-right">
            <button type="submit" class="md-btn md-btn-primary" data-style="zoom-in">{{ __('submit') }}</button>
        </div>
    </div>
{!! Form::close() !!}