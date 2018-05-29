@extends('app.index')

@section('content')

<div class="midale-container-wrraper" data-bgimg style="background-image:url({{ URL::asset('assets/images/login-pg-bg.jpg') }})">
    <div class="col-xs-12">
        <div class="row">
            <section class="login-section">
                <div class="container">
                    <div class="loginform_frame">
                        <div class="title-underline">Log In Your Account</div>
                        {!! Form::open(array('action' => 'HomeController@do_login','id' => 'loginform')) !!}
                        <div class="formdiv">
                            <div class="form-group">
                                <div class="placeholder_prn">
                                    <input type="text" name="uemail" id="uemail" class="form-control" />
                                    <span class="placeholder">Enter Your Email</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="placeholder_prn">
                                    <input type="password" name="password" id="password" class="form-control" />
                                    <span class="placeholder">Enter Your Password</span>
                                </div>
                            </div>
                            <div class="form-group keep-login">
                                <label class="chekbox"><input name="remember" type="checkbox"><span></span>
                                <p>Keep Me Logged In</p></label>
                            </div>
                            <div class="form-group login-btn">
                                <button class="btn btn-darkblue-flat btn-block" data-style="zoom-in"> Login </button>
                            </div>
                            <div class="form-group register-info">
                                <ul>
                                    <li class="pull-left">Don’t have an account? <a href="#">Register Here!</a></li>
                                    <li class="pull-right"><a href="#">Recover my password</a></li>
                                </ul>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
       </div>
    </div>
</div>

@endsection