{!! Form::open(array('class' => 'uk-form-stacked','action' => 'Admin\AttributeController@store','id' => 'attribute_form')) !!}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <label>{{ __('attr_name') }}</label>
                <input type="text" name="aname" id="aname" class="md-input" required/>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1 uk-text-right">
            <button type="submit" class="md-btn md-btn-primary" data-style="zoom-in">{{ __('submit') }}</button>
        </div>
    </div>
{!! Form::close() !!}