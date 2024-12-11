@include('layouts.home.header')
@include('layouts.home.navbar')

<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Semua Tugas</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">

                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">

                <div class="row">
    @foreach ($tasks->take(5) as $task) <!-- Mengambil 3 tugas saja -->
        <div class="col-md-4 mb-4"> <!-- Membagi menjadi 3 kolom -->
            <div class="card h-100">
                <img src="{{ asset('storage/gambar/task/' . $task->gambar1) }}" class="card-img-top img-fluid" alt="..." style="height: 200px; object-fit: cover; width: 100%;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $task->kategori->nama }}</h5>
                    <h3>{{ $task->judul }}</h3>
                    <p>Di buat oleh : {{ $task->user->name }}</p>
                    <p>Status Tugas: {{ $task->status_work }}</p>
                    <div class="mt-auto"> <!-- Memastikan tombol berada di bawah -->
                        <span class="text-muted">{{ $task->created_at->format('d M Y') }}</span>
                        <a href="{{ route('task.show', $task->id) }}" class="btn btn-primary d-block mt-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


                </div>
                
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
</main>

@include('layouts.home.footer')
