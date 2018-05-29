@extends('admin.app.index')
@section('title','Dashboard')

@section('content')

<div class="btn-top-left">
    <h4 class="heading_a uk-margin-bottom">{{ __('side_import') }}</h4>
</div>
<div class="md-card">
    <div class="md-card-content large-padding">
        {!! Form::open(array('class' => 'uk-form-stacked','action' => 'Admin\ImportController@store','id' => 'import_form','files' => true)) !!}
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        {{ Form::select('importTable', $tablelist, '', ['data-md-selectize' => '','data-md-selectize-bottom' => '','id' => 'importTable']) }}
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-form-file md-btn md-btn-primary" style="margin-right: 12px;">{{ __('select_file') }}
                            <input id="form-file" type="file" name="filexls" id="filexls"/>
                        </div>
                        <label class="filename"></label>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <a href="javascript:void(0);" class="uk-form-file md-btn" id="download_sample" target="_blank">{{ __('dwnld_sampl_file') }}</a>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <button type="submit" class="md-btn md-btn-primary">{{ __('upload') }}</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@if (\Session::has('import_summary'))
    <div class="uk-alert" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        <h4 class="heading_b">{{ __('report') }}</h4>
        {!! \Session::get('import_summary') !!}
    </div>
@endif

@endsection