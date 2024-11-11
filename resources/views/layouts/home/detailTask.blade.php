@include('layouts.home.header')

@include('layouts.home.navbar')
<main>
    <!--? slider Area Start-->
    <section class=" slider-area2">
        <div class="slider-height2">
            <div class="single-slider slider-height2 ">
                <div class="container">
                    <div class="row  justify-content-center">
                        <div class="col-xl-8 col-lg-11 col-md-12 ">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Tugas {{ $task->judul }}</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Di Buat Oleh</a></li>
                                        <li class="breadcrumb-item"><a href="">{{ $task->user->name }}</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="">{{ $task->created_at }}</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="">Kategori</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="">{{ $task->kategori->nama }}</a>
                                        </li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--? About Area-1 Start -->
    <section class="about-area1 fix pt-10">
        <div class="support-wrapper align-items-center">
            <div class="left-content1">
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                    </div>
                    <div class="front-text">
                        <h2 class="">Deskripsi :</h2> <br>
                        <h3 class="">{{ $task->deskripsi }}</h3>
                    </div>
                </div>
            </div>
            <div class="right-content1">
                <!-- img -->
                <div class="right-img">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Gambar Tugas</h4>
                            <div class="bootstrap-carousel">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @if ($task->gambar1)
                                            <div class="carousel-item active">
                                                <img class="d-block w-100"
                                                    src="{{ asset('storage/gambar/task/' . $task->gambar1) }}"
                                                    alt="First slide">
                                            </div>
                                        @endif

                                        @if ($task->gambar2)
                                            <div class="carousel-item @if (!$task->gambar1) active @endif">
                                                <img class="d-block w-100"
                                                    src="{{ asset('storage/gambar/task/' . $task->gambar2) }}"
                                                    alt="Second slide">
                                            </div>
                                        @endif

                                        @if ($task->gambar3)
                                            <div class="carousel-item @if (!$task->gambar1 && !$task->gambar2) active @endif">
                                                <img class="d-block w-100"
                                                    src="{{ asset('storage/gambar/task/' . $task->gambar3) }}"
                                                    alt="Third slide">
                                            </div>
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon">
                                        </span>
                                        <span class="sr-only">Next
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br>
    <section class="about-area3 fix">
        <div class="support-wrapper align-items-center">
            <div class="right-content3 kecil">
                <!-- img -->
                <img src="{{ asset('courses-master') }}/assets/img/gallery/tasklist.png" alt="" width="800px">
            </div>
            <div class="left-content3">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="tengah">Ketentuan</h2>
                    </div>
                </div>
                <div class="single-features">

                    <div class="features-caption">
                        <p class="tengah">{{ $task->ketentuan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    @if (Auth::check())
        <section class="team-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            @if (Auth::user()->role === 'pembuat')
                                @if ($task->isCompleted())
                                    <h2>Tugas Terselesaikan</h2>
                                @else
                                    @php
                                        $application = $task->kerjakanTugas()->where('user_id', Auth::id())->first();
                                    @endphp
                                    @if ($application)
                                        @if ($application->status == 'menunggu')
                                            <h2>Harap Menunggu Persetujuan Penyedia</h2>
                                            <strong>Status Anda : Menuggu Disetujui</strong>
                                        @elseif ($application->status == 'disetujui')
                                            <h2>Harap Kumpulkan Tugas</h2>

                                            <a href="{{ route('submit.form', $task->id) }}"
                                                class="genric-btn primary">Kumpulkan Tugas</a><br><br>
                                            <a href="{{ route('chat.index', $task->user->id) }}"
                                                class="btn btn-primary">Hubungi Penyedia</a>
                                        @else
                                            <strong style="text-color = red">Status Anda : Ditolak</strong>
                                        @endif
                                    @else
                                        <h2>Berminat Mengerjakan Tugas ?</h2>
                                        <form action="{{ route('task.apply', $task->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-lg btn-light rounded-3 px-5 py-3 confirm-btn"
                                                type="submit">Kerjakan
                                                Tugas</button>
                                        </form>

                                    @endif
                                @endif
                            @elseif (Auth::user()->role === 'penyedia' && $task->isCompleted())
                                <h2>Tugas Anda telah selesai</h2>
                            @elseif (Auth::user()->role === 'penyedia')
                                <h2>List Pengerja Yang berminat</h2>
                        </div>
                    </div>
                </div>

                <div class="team-active">
                    @foreach ($applications as $application)
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img class="rounded-circle"
                                    src="{{ asset('storage/gambar/user/' . $application->user->foto) }}" alt=""
                                    width="150px" height="150px">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">{{ $application->user->name }}</a></h5>
                                @if ($application->status == 'disetujui')
                                    <h2>Status : Di Setujui</h2>
                                    <a href="{{ route('submit.view', $application->task->id) }}"
                                        class="btn btn-outline-secondary rounded-pill">Lihat Tugas</a><br><br>
                                    <a href="{{ route('chat.index', $application->user->id) }}"
                                        class="btn btn-primary">Hubungi Pengerja</a>
                                @endif
                            </div>
                            @if ($application->status == 'menunggu')
                                <br>
                                <form action="{{ route('task.approved', $application->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-secondary rounded-pill select-worker-btn"
                                        type="submit">Setujui</button>
                                </form>
                                <br>
                                <form action="{{ route('task.unapproved', $application->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-secondary rounded-pill"
                                        type="submit">Tolak</button>
                                </form>
                                <br>
                            @endif
                            {{-- <button class="btn btn-outline-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="{{route ('profile.view', $application->user->id)}}">View
                                Profile</button> --}}

                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
    </section>
    @endif

    <!-- Services End -->
</main>

@include('layouts.home.footer')
