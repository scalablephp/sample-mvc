{!! Form::open(array('class' => 'uk-form-stacked','action' => 'Admin\SubAttributeController@store','id' => 'subattribute_form')) !!}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <label>{{ __('attr') }}</label>
                {{ Form::select('_attrid', $attribute, $attributeID, ['class' => 'md-input','id' => '_attrid']) }}
            </div>
            <div class="uk-form-row">
                <label>{{ __('sattr_name') }}</label>
                <input type="text" name="sname" id="sname" class="md-input" required/>
            </div>
            <div class="uk-form-row">
                <label>{{ __('sort_order') }}</label>
                <input type="text" name="sortid" id="sortid" class="md-input" value="{{ $lastsort }}"/>
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
            <button type="submit" class="md-btn md-btn-primary" data-style="zoom-in">{{ __('submit') }}</button>
        </div>
    </div>
{!! Form::close() !!}