@extends('app.index')

@section('content')

<div class="midale-container-wrraper" data-bgimg='loginbg' style="background-image:url({{ URL::asset('assets/images/register-pg-bg.jpg') }})" >
    <div class="col-xs-12">
        <div class="row">
             <section class="login-section register-section">
                <div class="container">
                    <div class="loginform_frame">
                        {!! Form::open(array('action' => 'HomeController@store','id' => 'parent_form')) !!}
                        <div class="step1">
                            <div class="title-underline">Register Your Account</div>
                            <div class="formdiv">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="fname" id="fname"/>
                                                <span class="placeholder">First name </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="lname" id="lname"/>
                                                <span class="placeholder">Last name </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="email" class="form-control" name="pemail" id="pemail"/>
                                                <span class="placeholder">Email </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="password" class="form-control" name="password" id="password"/>
                                                <span class="placeholder">Enter password </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="password" class="form-control" name="cpassword" id="cpassword"/>
                                                <span class="placeholder">Enter confirm password</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="street" id="street"/>
                                                <span class="placeholder">Street</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="city" id="city"/>
                                                <span class="placeholder">City</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="state" id="state"/>
                                                <span class="placeholder">State</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="country" id="country"/>
                                                <span class="placeholder">Country</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="zipcode" id="zipcode"/>
                                                <span class="placeholder">Zipcode</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="text" class="form-control" name="phone" id="phone"/>
                                                <span class="placeholder">Phone number</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group login-btn">
                                            <button type="button" class="btn btn-darkblue-flat btn-block" id="next" data-style="zoom-in"> Next </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group register-info">
                                            <ul>
                                                <li>Do you have already an account? <a href="javascript:void(0);">Login Here!</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step2" style="display: none;">
                            <div class="title-underline">Other information</div>
                            <div style="float: right;"><a href="javascript:void(0);" id="back">Back</a></div>
                            <div class="formdiv">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <input type="number" class="form-control" name="avghour" id="avghour"/>
                                                <span class="placeholder">Average monthly hours</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-prn">
                                            <div class="placeholder_prn">
                                                <select class="form-control" name="children" id="children">
                                                    <option value="">Select no. of childrens</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                                <i class="fa fa-sort-desc fa-6" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group select-prn">
                                            <div class="placeholder_prn">
                                                <select class="form-control" name="member" id="member">
                                                    <option value="">Select no. of house member</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                </select>
                                                <i class="fa fa-sort-desc fa-6" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-prn">
                                            <div class="placeholder_prn">
                                                <select class="form-control" name="animal" id="animal">
                                                    <option value="">Select no. of animals in house</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <i class="fa fa-sort-desc fa-6" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-prn">
                                        <div class="form-group">
                                            <div class="placeholder_prn">
                                                <textarea class="form-control" name="need" id="need"></textarea>
                                                <span class="placeholder">Describe your needs </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group keep-login">
                                            <label class="chekbox"><input type="checkbox" name="terms" id="terms"><span></span>
                                            <p>I agree to <a href="javascript:void(0);">Terms of Use.</a> For details on collection and use of your information,see our <a href="javascript:void(0);">Privacy Policy.</a></p></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group login-btn">
                                            <button class="btn btn-darkblue-flat btn-block"> save </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group register-info">
                                            <ul>
                                                <li>Do you have already an account? <a href="javascript:void(0);">Login Here!</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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