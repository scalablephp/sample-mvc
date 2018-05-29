<!DOCTYPE html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]--><!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>D-Support Login</title>
    <link media="all" type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <!-- uikit -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('bower_components/uikit/css/uikit.almost-flat.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/js/ladda/ladda.min.css') }}">
    <!-- admin login page -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/login_page.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/messages.js') }}"></script>
    <script type="text/javascript">Lang.setLocale('{{ \App::getLocale() }}');</script>
</head>
<body class="login_page">
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form" @if ($_token != "") style="display: none;" @endif>
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                {!! Form::open(array('action' => 'Admin\LoginController@login','id' => 'form_login')) !!}
                    <div class="uk-form-row">
                        <label for="login_username">{{ __('email_addr') }}</label>
                        <input class="md-input" type="email" id="username" name="username" tabindex="1" required/>
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">{{ __('pass') }}</label>
                        <input class="md-input" type="password" id="password" name="password" tabindex="2" required/>
                    </div>
                    <div class="uk-margin-top">
                        <a href="javascript:void(0);" id="password_reset_show" class="uk-float-right" tabindex="5">{{ __('forgot_pass') }}</a>
                        <span class="icheck-inline">
                            <input type="checkbox" name="stay_signed" id="stay_signed" tabindex="3" data-md-icheck />
                            <label for="stay_signed" class="inline-label">{{ __('remember') }}</label>
                        </span>
                    </div>
                    <div class="uk-margin-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" tabindex="4" data-style="zoom-in">{{ __('sign_in') }}</button>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none;">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">{{ __('reset_pass') }}</h2>
                {!! Form::open(array('action' => 'Admin\LoginController@forgot','id' => 'form_forgot')) !!}
                    <div class="uk-form-row">
                        <label for="email">{{ __('your_email_addr') }}</label>
                        <input class="md-input" type="email" id="email" name="email" tabindex="1" required/>
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block" tabindex="2" data-style="zoom-in">{{ __('reset_pass') }}</button>
                    </div>
                    <div class="uk-margin-top">
                        <a href="javascript:void(0);" class="uk-float-right back_to_login" tabindex="3">{{ __('back_login') }}</a>
                        <span class="icheck-inline"></span>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="md-card-content large-padding" id="reset_login_password" @if ($_token == "") style="display: none;" @endif>
                {!! Form::open(array('action' => 'Admin\LoginController@reset_pwd','id' => 'form_reset')) !!}
                    {{ Form::hidden('_rtoken',$_token,['id' => '_rtoken']) }}
                    <div class="uk-form-row">
                        <label for="login_username">{{ __('email_addr') }}</label>
                        <input class="md-input" type="email" id="rusername" name="rusername" tabindex="1" required/>
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">{{ __('pass') }}</label>
                        <input class="md-input" type="password" id="rpassword" name="rpassword" tabindex="2" required/>
                    </div>
                    <div class="uk-form-row">
                        <label for="confirm_password">{{ __('conf_pass') }}</label>
                        <input class="md-input" type="password" id="confirmpassword" name="confirmpassword" tabindex="3" required/>
                    </div>
                    <div class="uk-margin-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" tabindex="4" data-style="zoom-in">{{ __('reset') }}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- common functions -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/common.js') }}"></script>
    <!-- uikit functions -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/uikit_custom.min.js') }}"></script>
    <!-- core functions -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/altair_admin_common.min.js') }}"></script>
    <!-- page specific plugins -->
    <!-- validation -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- ladda -->
    <script type="text/javascript" src="{{ URL('https://lab.hakim.se/ladda/dist/spin.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL('https://lab.hakim.se/ladda/dist/ladda.min.js') }}"></script>
    <!-- notifications -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/pages/components_notifications.js') }}"></script>
    <!-- login page functions -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/pages/login.min.js') }}"></script>
</body>
</html>