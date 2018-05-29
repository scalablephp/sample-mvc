@extends('app.index')

@section('content')

<div class="main-banner">
    <div class="captions">
        <div class="container">
            <div class="caption caption1" name="c0">
                <h1>We Will Find You <br>The Best <span>Babysitter</span> <br>For Your Little One...</h1>
                <p>Suspendisse est dolor, adipiscing eget suscipit ac,
                    <br>gravida nec massa. Donec commodo.</p>
                <a class="btn btn-white" href="#">Contact Us</a>
            </div>
            <div class="caption caption2" name="c1">
                <h1>Suspendisse <br>The Best <span>Babysitter</span><br>est dolor, adipiscing eget suscipit</h1>
                <p>We Will Find You eget suscipit ac,
                    <br>gravida nec massa. Donec commodo.</p>
                <a class="btn btn-white" href="#">Contact Us</a>
            </div>
        </div>
    </div>
    <div id="buttons" class="prev-next-btn">
        <div class="container">
            <div id="left" value="left" onClick="show_previous()" class="button-slider">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="zmdi zmdi-long-arrow-left zmdi-hc-border-circle zmdi-hc-fill"></i>
                </a>
            </div>
            <div id="rigth" value="rigth" onClick="show_next()" class="button-slider">
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="zmdi zmdi-long-arrow-right zmdi-hc-border-circle zmdi-hc-fill"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="slider">
        <div class="slide" name="0" style="background-image:url({{ URL::asset('assets/images/slider-images.jpg') }})"></div>
        <div class="slide" name="1" style="background-image:url({{ URL::asset('assets/images/index-1.jpg') }})"></div>
    </div>
    <div class="slider-popup">
        <div class="video-popupp">
            <a href="#"><i class="icon icon-10"></i></a>
        </div>
    </div>
</div>
<div class="midale-container-wrraper">
    <div class="col-xs-12">
        <div class="row">
            <div class="index-section-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="imagesec">
                                <img src="{{ URL::asset('assets/images/index-1.jpg') }}">
                                <div class="imageicon">
                                    <i class="icon icon-11"></i>
                                </div>
                                <div class="boder"></div>
                            </div>
                            <div class="textsec">
                                <h3>Parents Looking for a Babysitter?</h3>
                                <p>At vero eos et accusamus et iusto odio dignissimos</p>
                                <a class="btn btn-bluedark" href="#">I’m Parent</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="imagesec">
                                <img src="{{ URL::asset('assets/images/index-2.jpg') }}">
                                <div class="imageicon">
                                    <i class="icon icon-8"></i>
                                </div>
                                <div class="boder"></div>
                            </div>
                            <div class="textsec">
                                <h3>A Great Opportunity for Babysitter? </h3>
                                <p>Et harum quidem rerum facilis est et expedita distinctio</p>
                                <a class="btn btn-bluedark" href="#">I’m  babySitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="index-section-3 ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 imgprn">
                            <div class="image-inner">
                                <img src="{{ URL::asset('assets/images/index-3.jpg') }}">
                            </div>
                        </div>
                        <div class="col-md-6 textprn">
                            <div class="index4-inner ">
                                <h2>Welcome to Sonny Sailor</h2>
                                <p>Suspendisse est dolor, adipiscing eget suscipit ac, gravida nec massa. Donec commodo erat eget nisi ultricies mattis. In molestie laoreet enim, et scelerisque sapien gravida in. Phasellus vestibulum scelerisque pulvinar. Integer lacinia tristique urna at dignissim. </p>
                                <ul>
                                    <li>Standard dummy text ever since the when an unknown took a galley of type  it to make a type specimen book.</li>
                                    <li>Perspiciatis unde omnis iste natus error sit voluptatem accusantium.</li>
                                    <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a of the system teachings.</li>
                                </ul>
                                <a href="#" class="btn btn-outlineblue">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="index-section-4">
                <div class="container">
                    <div class="works-title">
                        <h2>How it Works</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3 works-1">
                            <div class="howit-icon">
                                <div class="works-icon">
                                    <span class=""><i class="icon icon-7"></i></span>
                                    <h4>01</h4>
                                </div>
                            </div>
                            <div class="works-text">
                                <h2>Find a Job</h2>
                                <p>Lorem ipsum dolor sit amet, quis consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="col-md-3 works-2">
                            <div class="howit-icon">
                                <div class="works-icon">
                                    <span class=""><i class="icon icon-3"></i></span>
                                    <h4>02</h4>
                                </div>
                            </div>
                            <div class="works-text">
                                <h2>Check Parent’s Profile</h2>
                                <p>Lorem ipsum dolor sit amet, quis consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="col-md-3 works-3">
                            <div class="howit-icon">
                                <div class="works-icon">
                                    <span class=""><i class="icon icon-2"></i></span>
                                    <h4>03</h4>
                                </div>
                            </div>
                            <div class="works-text">
                                <h2>Send Request</h2>
                                <p>Lorem ipsum dolor sit amet, quis consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="col-md-3 works-4">
                            <div class="howit-icon">
                                <div class="works-icon">
                                    <span class=""><i class="icon icon-1"></i></span>
                                    <h4>04</h4>
                                </div>
                            </div>
                            <div class="works-text">
                                <h2>Approve Request</h2>
                                <p>Lorem ipsum dolor sit amet, quis consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-bluedark" href="#">View Details</a>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection