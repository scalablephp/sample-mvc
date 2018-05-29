@extends('admin.app.index')
@section('title','Dashboard')

@section('content')

<div class="btn-top-left">
    <h4 class="heading_a uk-margin-bottom">{{ __('side_place') }}</h4>
    <div class="btn-prt-right">
        <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" onclick="showAjaxModal('{{ route('place.create') }}','{{ __("place_add") }}');"><i class="uk-icon-plus-square"></i> {{ __('add_new') }}</button>
        <a href="{{ url('admin/place/export') }}" class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light"><i class="uk-icon-download"></i> {{ __('export') }}</a>
    </div>
</div>
<div class="md-card uk-margin-medium-bottom main-first-tle">
    <div class="md-card-content">
        <table id="table_place" class="uk-table manage-attributes" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><span>{{ __('place_id') }}</span></th>
                    <th><span>{{ __('place_name') }}</span></th>
                    <th><span>{{ __('muncplt_name') }}</span></th>
                    <th><span>{{ __('sort_order') }}</span></th>
                    <th><span>{{ __('action') }}</span></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection