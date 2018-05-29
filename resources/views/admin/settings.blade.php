@extends('admin.app.index')
@section('title','Dashboard')

@section('content')

@if (\Session::has('setting_updated'))
    <div class="uk-alert" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        {!! \Session::get('setting_updated') !!}
    </div>
@endif
<div class="btn-top-left">
    <h4 class="heading_a uk-margin-bottom">{{ __('side_setting') }}</h4>
</div>	
<div class="uk-width-medium-1-2">
	<div class="md-card">
		<div class="md-card-content large-padding">
	        {!! Form::open(array('method' => 'patch','class' => 'uk-form-stacked','action' => ['Admin\SettingController@update',''],'id' => 'setting_form')) !!}
	        	<div class="uk-form-row">
	                <label>{{ __('admin_email') }}</label>
	                <input type="text" name="admin_email" id="admin_email" class="md-input" value="{{ $admin_email }}" />
	            </div>
	            <div class="uk-form-row">
	                <label>{{ __('acc_block_time') }}</label>
	                <input type="text" name="block_timeout" id="block_timeout" class="md-input" value="{{ $block_timeout }}" />
	            </div>
		        <div class="uk-form-row uk-width-1-1 uk-text-right">
		            <button type="submit" class="md-btn md-btn-primary" data-style="zoom-in">{{ __('submit') }}</button>
		        </div>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>

@endsection