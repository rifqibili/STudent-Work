@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">

                            <img class="mr-3" src="{{ asset('storage/gambar/user/' . $user->foto) }}" width="80"
                                height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">{{ $user->name }}</h3>
                                <p class="text-muted mb-0">{{ $user->role }}</p>
                            </div>
                        </div>

                        <h4>Tentang Saya</h4>
                        <ul class="card-profile__info">
                            <li><strong class="text-dark mr-4">Email</strong> <span>{{ $user->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Data Diri Anda</h3><br>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Nama <span
                                    class="text-danger">:</span>
                            </label>
                            <div class="col-lg-6">
                                <h4>{{ $user->name }}</h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Email <span
                                    class="text-danger">:</span>
                            </label>
                            <div class="col-lg-6">
                                <h4>{{ $user->email }}</h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Peran <span
                                    class="text-danger">:</span>
                            </label>
                            <div class="col-lg-6">
                                <h4>{{ $user->role }}</h4>
                            </div>
                        </div>
                        @if (Auth::user()->role === 'pembuat')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">Keahlian <span
                                    class="text-danger">:</span>
                            </label>
                            <div class="col-lg-6">
                                <h4>{{ $user->keahlian }}</h4>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-suggestions">LikedIn <span
                                    class="text-danger">:</span>
                            </label>
                            <div class="col-lg-6">
                                <h4>{{ $user->linkedin }}</h4>
                            </div>
                        </div>
                                                  
                        @endif

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>

@include('layouts.dashboard.footer')
