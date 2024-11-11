<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{asset ('courses-master')}}/assets/img/logo/lo.png" alt=""></a>

                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">                                                                
                                            <li class="active" ><a href="{{route('home')}}">Home</a></li>
                                            <li><a href="/#about">About</a></li>
                                             @if (Auth::user())
                                               <li><a href="{{route ('dashboard')}}">Dashboard</a></li> 
                                            @else
                                            <li class="button-header margin-left "><a href="{{route ('login')}}" class="btn">Log In</a></li>
                                            <li class="button-header"><a href="{{route ('register')}}" class="btn btn3">Register</a></li>
                                            @endif  
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>