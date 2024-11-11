<div class="header">  
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">

        </div>
        <div class="header-right">
            <ul class="clearfix">

                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{asset ('storage/gambar/user/' . Auth::user()->foto)}}">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('dashboard.profile') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <hr class="my-2">
                                <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                                    @csrf
                                </form>
                                <li><a href=""  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

