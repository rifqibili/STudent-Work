@include('auth.header')

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->


    <main class="login-body latar">

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Login Admin -->
        <form class="form-default" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="index.html"><img src="{{ asset('courses-master') }}/assets/img/logo/loder.png"
                            alt=""></a>
                </div>
                <h2>Login Here</h2>
                <div class="form-input">
                    <label for="name">Email</label>
                    <input type="email" name="email" placeholder="example@example.com">
                </div>
                <div class="form-input">
                    <label for="name">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="login">
                </div>

                <!-- Forget Password -->
                <a href="{{route ('forgot-password')}}" class="forget">Forget Password</a>
                <!-- Forget Password -->
                <a href="{{ route('register.form') }}" class="registration">Registration</a>
            </div>
        </form>
        <!-- /end login form -->
    </main>


    @include('auth.footer')
