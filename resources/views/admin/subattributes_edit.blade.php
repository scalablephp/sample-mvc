{!! Form::open(array('method' => 'patch','class' => 'uk-form-stacked','action' => ['Admin\SubAttributeController@update',$subattribute->SubAttributeId],'id' => 'subattribute_form')) !!}
    {{ Form::hidden('_sname',$subattribute->NameEn,['id' => '_sname']) }}
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <label>{{ __('attr') }}</label>
                {{ Form::select('_attrid', $attribute, $subattribute->AttributeId, ['class' => 'md-input','id' => '_attrid']) }}
            </div>
            <div class="uk-form-row">
                <label>{{ __('sattr_name') }}</label>
                <input type="text" name="sname" id="sname" class="md-input" value="{{ $subattribute->NameEn }}" required/>
            </div>
            <div class="uk-form-row">
                <label>{{ __('sort_order') }}</label>
                <input type="text" name="sortid" id="sortid" class="md-input" value="{{ $subattribute->SortID }}"/>
            </div>
            <div class="uk-form-row">
                <p>
                    <label for="publish" class="inline-label">{{ __('publish') }}:&nbsp;</label>
                    <input type="checkbox" name="publish" id="publish" data-md-icheck @if($subattribute->IsPublished == "1") checked @endif/>
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