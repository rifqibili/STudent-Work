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
                <div class="col-lg-8 mb-5 mb-lg-0">

                    <div class="row">
                        @foreach ($tasks as $task)
                            <div class="col-sm-6">
                                <img src="{{ asset('storage/gambar/task/' . $task->gambar1) }}" class="card-img-top" alt="..."
                                width="200px" height="200px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $task->kategori->nama }}</h5>
                                    <h1>{{ $task->judul }}</h1>
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
                                        class="border-btn border-btn2">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                            <ul class="list cat-list">
                                @foreach ($kategoris as $kategori)
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>{{$kategori -> nama}}</p>
                                            <p>({{$taskCount}})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
</main>

@include('layouts.home.footer')
