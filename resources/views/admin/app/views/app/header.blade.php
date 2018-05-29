<header class="<?php if(isset($headerclass)){echo 'index-header';}?>">
    <div class="container">
        <div class="logo">
            <a href="#"><img src="{{ URL::asset('assets/images/logo.png') }}"></a>
        </div>
        <div class="right-header">
            <nav class="main-nav">
                <ul class="nav_menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">How it Works</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul class="ul_loginregister">
                    <li><a href="#"><i class="zmdi zmdi-lock-outline"></i>Login</a></li>
                    <li class="divider">|</li>
                    <li><a href="#"><i class="zmdi zmdi-edit"></i>Register</a></li>
                </ul>
                <button class="toggle-menu"><i class="zmdi zmdi-menu"></i></button>
            </nav>
        </div>
    </div>
</header>