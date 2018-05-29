@extends('admin.app.index')
@section('title','Dashboard')

@section('content')

<div class="btn-top-left">
    <h4 class="heading_a uk-margin-bottom">{{ __('side_log') }}</h4>
</div>
<div class="md-card uk-margin-medium-bottom main-first-tle manage-log">
    <div class="md-card-content large-padding">
        {!! Form::open(array('class' => 'uk-form-stacked','id' => 'log_form')) !!}
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-10 filterlabel">
                    <label>{{ __('filter') }}:</label>
                </div>
                <div class="uk-width-medium-9-10">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <label>{{ __('search') }}</label>
                            <input type="text" name="lsearch" id="lsearch" class="md-input"/>
                        </div>
                        <div class="uk-width-medium-1-2">
                            {{ Form::select('logTableID', $tablelist, '', ['data-md-selectize' => '','data-md-selectize-bottom' => '','id' => 'logTableID']) }}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="md-card-content">
        <table id="table_log" class="uk-table table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><span>{{ __('log_id') }}</span></th>
                    <th><span>{{ __('table') }}</span></th>
                    <th><span>{{ __('detail') }}</span></th>
                    <th><span>{{ __('created') }}</span></th>
                    <th><span>{{ __('action') }}</span></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection