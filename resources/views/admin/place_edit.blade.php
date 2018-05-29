{!! Form::open(array('method' => 'patch','class' => 'uk-form-stacked','action' => ['Admin\GeoPlaceController@update',$place[0]->GeoPlaceId],'id' => 'place_form')) !!}
    {{ Form::hidden('_plname',$place[0]->NameEn,['id' => '_plname']) }}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <div class="uk-autocomplete uk-form uk-position-relative" data-uk-autocomplete="{minLength:1,method:'get',source:'getmunicipality'}">
                    <label>{{ __('muncplt') }}</label>
                    <input type="text" name="mid" id="mid" class="md-input" value="{{ $place[0]->geomunicipality->NameEn }}" data-id="{{ $place[0]->geomunicipality->GeoMunicipalityId }}" required/>
                </div>
            </div>
            <div class="uk-form-row">
                <label>{{ __('place_name') }}</label>
                <input type="text" name="plname" id="plname" class="md-input" value="{{ $place[0]->NameEn }}" required/>
            </div>
            <div class="uk-form-row">
                <label>{{ __('sort_order') }}</label>
                <input type="text" name="sortid" id="sortid" class="md-input" value="{{ $place[0]->SortID }}"/>
            </div>
            <div class="uk-form-row">
                <p>
                    <label for="publish" class="inline-label">{{ __('publish') }}:&nbsp;</label>
                    <input type="checkbox" name="publish" id="publish" data-md-icheck @if($place[0]->IsPublished == "1") checked @endif/>
                </p>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1 uk-text-right">
            <button type="submit" class="md-btn md-btn-primary" data-style="zoom-in">{{ _('submit') }}</button>
        </div>
    </div>
{!! Form::close() !!}