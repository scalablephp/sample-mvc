@extends('admin.app.index')
@section('title','Dashboard')

@section('content')

<div class="btn-top-left">
    <h4 class="heading_a uk-margin-bottom">{{ __('side_attr') }}</h4>
    <div class="btn-prt-right">
        {{ Form::hidden('_selectedID','',['id' => '_selectedID']) }}
        <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" onclick="showAjaxModal('{{ route('attributes.create') }}','{{ __("attr_add") }}');"><i class="uk-icon-plus-square"></i> {{ __('add_new') }}</button>
        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
            <button class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light"><i class="uk-icon-download"></i> {{ __('export') }} <i class="material-icons">&#xE313;</i></button>
            <div class="uk-dropdown">
                <ul class="uk-nav uk-nav-dropdown">
                    <li><a href="{{ url('admin/attributes/export') }}" id="export">{{ __('export_selected') }}</a></li>
                    <li><a href="{{ url('admin/attributes/export') }}">{{ __('export_all') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="md-card uk-margin-medium-bottom main-first-tle">
    <div class="md-card-content">
        <table id="table_attr" class="uk-table selectRow manage-attributes" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><span>{{ __('attr_id') }}</span></th>
                    <th><span>{{ __('attr_name') }}</span></th>
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
                    <li class="uk-active"><a href="#">{{ __('sattr') }}</a></li>
                    <!-- <li class="named_tab"><a href="#">Item A</a></li> -->
                </ul>
                <ul id="tabs_1_content" class="uk-switcher uk-margin">
                    <li>
                        <table id="table_subattr" class="uk-table manage-subattributes" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><span>{{ __('sattr_id') }}</span></th>
                                    <th><span>{{ __('sattr_name') }}</span></th>
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