@include('auth.header')

<body class="latar">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->


    <!-- Register -->

    <main class="login-body">

        <!-- Login Admin -->
        <form class="form-default" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="index.html"><img src="assets/img/logo/loder.png" alt=""></a>
                </div>
                <h2>Registration Here</h2>

                <div class="form-input">
                    <label for="name">Full name</label>
                    <input type="text" name="name" placeholder="Full name" required>
                </div>
                <div class="form-input">
                    <label for="name">Email Address</label>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-input">
                    <label for="name">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-input">
                    <label for="name">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div class="form-input">
                    <label for="name">Foto Profil</label>
                    <div class="d-flex justify-content-center mb-4">
                        <img id="selectedAvatar" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                            class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;"
                            alt="example placeholder" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                            <input type="file" class="form-control d-none" name="foto" id="customFile2"
                                onchange="displaySelectedImage(event, 'selectedAvatar')" />
                        </div>
                    </div>
                </div>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="Registration">
                </div>
                <a href="{{ route('login.form') }}" class="registration">login</a>
            </div>
        </form>

    </main>
    @include('auth.footer')
