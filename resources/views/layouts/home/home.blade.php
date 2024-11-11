@include('layouts.home.header')
@include('layouts.home.navbar')
<main>
    <!--? slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">Upload Tugas Anda<br> Biarkan Kami
                                    Kerjakan </h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">Di kerjakan oleh para ahli Terpilih
                                </p>
                                @if (!Auth::check())
                                    <a href="{{route('register')}}" class="genric-btn info circle arrow e-large" data-animation="fadeInLeft"
                                    data-delay="0.7s">Gabung Menjadi Penyedia</a> 
                                    <strong class="text-white">ATAU</strong>
                                    <a href="{{route('eula')}}" class="genric-btn info circle arrow e-large" data-animation="fadeInLeft"
                                    data-delay="0.7s">Gabung Menjadi Pengerja</a>
                                @elseif (Auth::user()->role === 'penyedia')
                                <a href="{{route('eula')}}" class="genric-btn info circle arrow e-large" data-animation="fadeInLeft"
                                    data-delay="0.7s">Gabung Menjadi Pengerja</a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ? services-area -->
    <div class="services-area">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ asset('courses-master') }}/assets/img/icon/icon1.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Banyak Tugas</h3>
                            <p>Banyak tugas yang di sediakan untuk pengerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ asset('courses-master') }}/assets/img/icon/icon2.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Pengerja Yang Mahir</h3>
                            <p>Menjamin Tugas di selesaikan dengan baik</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ asset('courses-master') }}/assets/img/icon/icon3.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Waktu Yang singkat</h3>
                            <p>Di buat dengan waktu yang sesuai dengan tugas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Tugas Tugas</h2>
                    </div>
                </div>
            </div>
            <div class="courses-actives">
                <!-- Single -->

                @foreach ($tasks as $task) 
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{ asset('storage/gambar/task/' . $task->gambar1) }}" alt=""
                                        width="500px" height="250px"></a>
                            </div>
                            <div class="properties__caption">
                                <p>{{ $task->kategori->nama }}</p>
                                <h3><a href="#">{{ $task->judul }}</a></h3>
                                <p>Di buat oleh : {{ $task->user->name }}</p>
                                <p>Status Tugas: {{ $task->status_work }}</p>
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <span class="">{{ $task->created_at }}</span>
                                    </div>
                                    <div class="price">

                                    </div>
                                </div>
                                <a href="{{ route('task.show', $task->id) }}"
                                    class="shadow-lg border-btn border-btn2">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="section-tittle text-center mt-20">
                    <a href="{{ route('task.all') }}" class="border-btn">Lihat Lebih Banyak Tugas</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses area End -->
    <!--? About Area-1 Start -->
    <section class="about-area1 fix pt-10">
        <div class="support-wrapper align-items-center">
            <div class="left-content1">
                <div class="about-icon">
                    <img src="{{ asset('courses-master') }}/assets/img/icon/about.svg" alt="">
                </div>
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Apa itu Get Task ?</h2>
                        <p>Adalah sebuah website yang membantu menyelesaikan tugas tugas sulit anda. Tugas yang bisa di kerjakan terngantung dengan kategori yang tersedia</p>
                    </div>
                </div>

            </div>
            <div class="right-content1">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ asset('courses-master') }}/assets/img/gallery/whatis.png" alt="" width="700px">
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    <!--? top subjects Area Start -->
    <div class="topic-area section-padding40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>kategori</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($kategoris as $kategori)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30 ">
                            <div class="topic-img">
                                <img src="{{ asset('storage/gambar/kategori/'. $kategori->gambar) }}"
                                    alt="" width="150px" height="150px">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="{{route ('task.all')}}">{{ $kategori->nama }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mt-20">
                        <a href="{{route ('task.all')}}" class="border-btn">View More Subjects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-area2 fix pb-padding" id="about">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ asset('courses-master') }}/assets/img/gallery/about.png" alt="">
                </div>
            </div>
            <div class="left-content2">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="" id="kami">Menyelesaikan tugas sulit anda</h2>
                        <p>kami berdedukasi untuk membantu dan mempermudah perkerjaan atau tugas setiap orang.
                            Kami akan menyelesaikan tugas yang anda berikan dengan memperkerjakan orang orang terpilih.
                            Kami akan menyelesaikan tugas anda yang sesuai dengan kategori dan standar kami. Jika tugas yang
                            anda berikan melanggar peratukan kami maka kami berhak untuk menghapusya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
</main>
@include('layouts.home.footer')
