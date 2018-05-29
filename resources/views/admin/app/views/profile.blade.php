@extends('app.index')

@section('content')

<div class="midale-container-wrraper">
    <div class="col-xs-12">
        <div class="row">
            <div class="page-title">
                <div class="container">
                    <h2>My Profile</h2>
                </div>
            </div>
            <div class="main-profile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 left-block myaccount-sidebar">
                            <div class="user-profile">
                                <h3>{{ $user->FirstName.' '.$user->LastName }}</h3>
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $user->State.', '.$user->Country }}</h4>
                                <div class="user-ico">
                                    <img src="{{ $userProfilePic.$user->Image }}" id="userimg">
                                    <a href="javascript:void(0);" id="ImgUpload"><i class="icon icon-18"></i></a>
                                    {!! Form::open(array('action' => 'UserController@profile_image','files' => true,'id' => 'profileimg_form')) !!}
                                        <input type="file" name="profileimg" id="profileimg" style="display: none;">
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="user-li">
                                <ul class="feature-menu">
                                    <li class="active"><a href="javascript:void(0);"><i class="icon icon-24"></i><text>My Profile</text></a></li>
                                    <li><a href="javascript:void(0);"><i class="icon icon-23"></i><text>My Requests</text></a></li>
                                    <li><a href="javascript:void(0);"><i class="icon icon-17"></i><text>My Messages</text></a></li>
                                    <li><a href="javascript:void(0);"><i class="icon icon-25"></i><text>My Sitters</text></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 right-block">
                            <div class="my-profile-section">
                                <div class="inner-title border-title">
                                    <h2><i class="icon icon-24"></i>My Profile</h2>
                                </div>
                                <div class="personal-info border-title">
                                    <div class="title-underline">Personal Information</div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="placeholder_prn">
                                                    <input type="number" name="avghour" id="avghour" class="form-control" value="{{ $user->AverageHours }}" />
                                                    <span class="placeholder">Average monthly hours</span>
                                                </div>
                                            </div>
                                            <div class="Schedule-cars">
                                                <h3>Care Type Schedule</h3>
                                                <ul>
                                                    <li>
                                                        <h4>Early Morning</h4>
                                                        <p>(Mon, Tue, Wed)</p>
                                                    </li>
                                                    <li>
                                                        <h4>Morning</h4>
                                                        <p>(Tue, Wed, Thu, Fri)</p>
                                                    </li>
                                                    <li>
                                                        <h4>Afternoon</h4>
                                                        <p>(Mon, Wed, Thu, Sat, Sun)</p>
                                                    </li>
                                                    <li>
                                                        <h4>Evening</h4>
                                                        <p>(All)</p>
                                                    </li>
                                                    <li>
                                                        <h4>Night</h4>
                                                        <p>(Thu, Fri, Sat, Sun)</p>
                                                    </li>
                                                </ul>
                                                <a href="#" class="edit-detail" data-dismiss="modal"><i class="icon icon-19"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->FirstName }}" />
                                                            <span class="placeholder">First name</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->LastName }}" />
                                                            <span class="placeholder">List name</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->Email }}" />
                                                            <span class="placeholder">Email</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->Street }}" />
                                                            <span class="placeholder">Street</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->City }}" />
                                                            <span class="placeholder">City</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->State }}" />
                                                            <span class="placeholder">State</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->Country }}" />
                                                            <span class="placeholder">Country</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->ZipCode }}" />
                                                            <span class="placeholder">Zipcode</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <input type="text" class="form-control" value="{{ $user->Phone }}" />
                                                            <span class="placeholder">Phone number</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-prn">
                                                    <div class="form-group">
                                                        <div class="placeholder_prn">
                                                            <textarea class="form-control">{{ $user->About }}</textarea>
                                                            <span class="placeholder">Your Needs</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 save-btn">
                                            <a href="#" class="btn-bluedark btn">save</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="childrens-info border-title">
                                    <div class="title-underline">Childrens Details</div>
                                    <div class="row">
                                        @foreach ($user_details['children'] as $child)
                                            <div class="col-md-4">
                                                <div class="child-hover same-block">
                                                    <h3>{{ $child['Name'] }}</h3>
                                                    <div class="child-ul">
                                                        <ul>
                                                            <li>
                                                                <h4>Age:</h4>
                                                                <p>{{ $child['Age'] }} Year</p>
                                                            </li>
                                                            <li>
                                                                <h4>Bedtime: </h4>
                                                                <p>{{ date('H:i A',strtotime($child['Bedtime'])) }}</p>
                                                            </li>
                                                            <li>
                                                                <h4>Likes:</h4>
                                                                <p>{{ $child['Likes'] }}</p>
                                                            </li>
                                                            <li>
                                                                <h4>Dislike:</h4>
                                                                <p>{{ $child['Dislike'] }}</p>
                                                            </li>
                                                            <li>
                                                                <h4>Allergies:</h4>
                                                                <p>{{ $child['Allergies'] }}</p>
                                                            </li>
                                                            <li>
                                                                <h4>Other information:</h4>
                                                                <p>{{ $child['OtheInfo'] }}</p>
                                                            </li>
                                                        </ul>
                                                        <div class="child-inner-hover">
                                                            <ul>
                                                                <li class="edit"><a href="{{ route('child-detail',['id' => $child['ID']]) }}"><i class="icon icon-20"></i></a></li>
                                                                <li class="delate"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4">
                                            <div class="add-child same-block">
                                                <a href="#" data-toggle="modal" data-target="#child-popup">
                                                    <i class="icon icon-21"></i>
                                                    <h3>Add Your Child Details</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="family-info border-title">
                                    <div class="title-underline">Family Members Details</div>
                                    <div class="row">
                                        @foreach ($user_details['member'] as $member)
                                            <div class="col-md-4">
                                                <div class="child-hover same-block">
                                                    <h3>{{ $member['Name'] }}</h3>
                                                    <div class="child-ul">
                                                        <ul>
                                                            <li>
                                                                <h4>Age:</h4>
                                                                <p>{{ $member['Age'] }} Year</p>
                                                            </li>
                                                            <li>
                                                                <h4>Relation: </h4>
                                                                <p>{{ $member['Relation'] }}</p>
                                                            </li>
                                                            <li>
                                                                <h4>Other information:</h4>
                                                                <p>{{ $member['OtheInfo'] }}</p>
                                                            </li>
                                                        </ul>
                                                        <div class="child-inner-hover">
                                                            <ul>
                                                                <li class="edit"><a href="#"><i class="icon icon-20"></i></a></li>
                                                                <li class="delate"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4">
                                            <div class="add-child same-block">
                                                <a href="#" data-toggle="modal" data-target="#child-popup">
                                                    <i class="icon icon-21"></i>
                                                    <h3>Add Your Member Details</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="animal-info border-title">
                                    <div class="title-underline">Animals Details</div>
                                    <div class="row">
                                        @foreach ($user_details['animal'] as $animal)
                                            <div class="col-md-4">
                                                <div class="child-hover same-block">
                                                    <h3>{{ $animal['Name'] }}</h3>
                                                    <div class="child-ul">
                                                        <ul>
                                                            <li>
                                                                <h4>Type: </h4>
                                                                <p>{{ $animal['Type'] }}</p>
                                                            </li>
                                                            <li>
                                                                <h4>Other information:</h4>
                                                                <p>{{ $animal['OtheInfo'] }}</p>
                                                            </li>
                                                        </ul>
                                                        <div class="child-inner-hover">
                                                            <ul>
                                                                <li class="edit"><a href="#"><i class="icon icon-20"></i></a></li>
                                                                <li class="delate"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4">
                                            <div class="add-child same-block">
                                                <a href="#" data-toggle="modal" data-target="#child-popup">
                                                    <i class="icon icon-21"></i>
                                                    <h3>Add Your Animal Details</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection