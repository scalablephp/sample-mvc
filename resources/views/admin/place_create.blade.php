{!! Form::open(array('class' => 'uk-form-stacked','action' => 'Admin\GeoPlaceController@store','id' => 'place_form')) !!}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <div class="uk-autocomplete uk-form uk-position-relative" data-uk-autocomplete="{minLength:1,method:'get',source:'getmunicipality'}">
                    <label>{{ __('muncplt') }}</label>
                    <input type="text" name="mid" id="mid" class="md-input" value="" required/>
                </div>
            </div>
            <div class="uk-form-row">
                <label>{{ __('place_name') }}</label>
                <input type="text" name="plname" id="plname" class="md-input" required/>
            </div>
            <div class="uk-form-row">
                <label>{{ __('sort_order') }}</label>
                <input type="text" name="sortid" id="sortid" class="md-input" value=""/>
            </div>
            <div class="uk-form-row">
                <p>
                    <label for="publish" class="inline-label">{{ __('publish') }}:&nbsp;</label>
                    <input type="checkbox" name="publish" id="publish" data-md-icheck checked/>
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