@extends('admin.app.index')
@section('title','Dashboard')

@section('content')

<div class="btn-top-left">
    <h4 class="heading_a uk-margin-bottom">{{ __('side_prov') }}</h4>
    <div class="btn-prt-right">
        {{ Form::hidden('_selectedID','',['id' => '_selectedID']) }}
        <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" onclick="showAjaxModal('{{ route('geography.create') }}','{{ __("province_add") }}');"><i class="uk-icon-plus-square"></i> {{ __('add_new') }}</button>
        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
            <button class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light"><i class="uk-icon-download"></i> {{ __('export') }} <i class="material-icons">&#xE313;</i></button>
            <div class="uk-dropdown">
                <ul class="uk-nav uk-nav-dropdown">
                    <li><a href="{{ url('admin/geography/export') }}" id="export">{{ __('export_selected') }}</a></li>
                    <li><a href="{{ url('admin/geography/export') }}">{{ __('export_all') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="md-card uk-margin-medium-bottom main-first-tle">
    <div class="md-card-content">
        <table id="table_province" class="uk-table selectRow manage-attributes" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><span>{{ __('province_id') }}</span></th>
                    <th><span>{{ __('province_name') }}</span></th>
                    <th><span>{{ __('sort_order') }}</span></th>
                    <th><span>{{ __('action') }}</span></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="md-card uk-margin-medium-bottom main-second-tle">
    <div class="md-card-content">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                    <li class="uk-active"><a href="#">{{ __('muncplt') }}</a></li>
                    <!-- <li class="named_tab"><a href="#">Item A</a></li> -->
                </ul>
                <ul id="tabs_1_content" class="uk-switcher uk-margin">
                    <li>
                        <table id="table_municipality" class="uk-table manage-subattributes" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><span>{{ __('muncplt_id') }}</span></th>
                                    <th><span>{{ __('muncplt_name') }}</span></th>
                                    <th><span>{{ __('publish') }}</span></th>
                                    <th><span>{{ __('sort_order') }}</span></th>
                                    <th><span>{{ __('action') }}</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection