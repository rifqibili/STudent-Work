@include('layouts.dashboard.header')

@include('layouts.dashboard.nav')

@include('layouts.dashboard.sideBar')

<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            @if (Auth::user()->role === 'admin')
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumlah Tugas</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $taskCount }}</h2>
                                <p class="text-white mb-0">Tersedia</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumlah Kategori</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $categoryCount }}</h2>
                                <p class="text-white mb-0">Tersedia</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumlah Pengguna</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $userCount }}</h2>
                                <p class="text-white mb-0">Akun Terdaftar</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumlah Pengerja</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $workerCount }}</h2>
                                <p class="text-white mb-0">Jumlah Pengerja</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <h1>SELAMAT DATANG ADMIN!!</h1>
            @elseif (Auth::user()->role === 'penyedia')
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jumlah Tugas Anda</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $taskById }}</h2>
                                <p class="text-white mb-0">Tersedia</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i
                                    class="fa-solid fa-bars-progress"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Tugas Terselesaikan</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $taskApprove }}</h2>
                                <p class="text-white mb-0">Terselesaikan</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-solid fa-list-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="text-center">
                                        <h2>Bagaimana cara kerja sebagai Penyedia ??</h2>
                                        <br>
                                    </div>
                                    <p>- Anda bisa memantau jumlah tugas yang terselesaikan dan jumlah tugas yang telah
                                        anda upload</p>
                                    <p>- Anda bisa menambahkan tugas yang ingin di selesaikan</p>
                                    <p>- Bagaimana cara menambahkan tugas ??</p>
                                    <ul>
                                        <li>
                                            * memilih pilihan formulir lalu pilih tambah tugas pada area sideBar
                                        </li>
                                        <li>
                                            * membuat detail mengenai tugas yang ingin di kerjakan
                                        </li>
                                        <li>
                                            * memilih kategori tugas yang sesuai, jika kategori tak tersedia bisa
                                            menghubungi pihak website
                                        </li>
                                    </ul>
                                    <p>- Anda bisa memilih pengerja yang ingin menyesaikan tugas anda dengan menekan tombol setuju atau tidak</p>
                                    <p>- Anda bisa menghubungi pembuat yang membuat tugas nya dengan menekan tombol
                                        hubungi penyedia di halaman tugas yang sudah di buat</p>
                                    <p>- Jika pembuat sudah mengirim tugas, Anda bisa melihat tugas tersebut pada
                                        sibeBar Tugas dan pilih Tugas anda dan ikuti langkah langkah di bawah</p>
                                    <ul>
                                        <li>
                                            * Di halaman tersebut anda bisa melihat tugas yang telah anda upload dan
                                            juga ada status tugas tersebut
                                        </li>
                                        <li>
                                            * pilih tugas yang anda upload
                                        </li>
                                        <li>
                                            * Pilihan Lihat tugas untuk melihat kembali tugas yang anda upload dan Lihat
                                            tugas yang di kirim untuk melihat tugas yang di selesaikan oleh Pembuat
                                        </li>
                                        <li>
                                            * Di pilihan Lihat tugas yang di kirim anda bisa mengunduh tugas yang telah
                                            terselesaikan dan memberikan status dengan menekan tombol yang tersedia
                                        </li>
                                    </ul>
                                    <p>- Maka telah selesai, Tugas anda terselaikan dengan baik dan sesuai dengan
                                        permintaan anda</p>
                                    <p>- Hubungi pihak admin jika terkena kendala atau saran dan masukan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">baru Tugas Anda</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $taskById }}</h2>
                                <p class="text-white mb-0">Tersedia</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i
                                    class="fa-solid fa-bars-progress"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Tugas Terselesaikan</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $taskApprove }}</h2>
                                <p class="text-white mb-0">Terselesaikan</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-solid fa-list-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="text-center">
                                        <h2>Bagaimana cara kerja sebagai Pengerja ??</h2>
                                        <br>
                                    </div>
                                    <p>- Anda bisa memantau jumlah tugas yang terselesaikan </p>
                                    <p>- Anda bisa Menyelesaikan tugas yang telah anda ambil</p>
                                    <p>- Bagaimana cara menambahkan tugas ??</p>
                                    <ul>
                                        <li>
                                            * memilih pilihan formulir lalu pilih tambah tugas pada area sideBar
                                        </li>
                                        <li>
                                            * membuat detail mengenai tugas yang ingin di kerjakan
                                        </li>
                                        <li>
                                            * memilih kategori tugas yang sesuai, jika kategori tak tersedia bisa
                                            menghubungi pihak website
                                        </li>
                                    </ul>
                                    <p>- Anda bisa menghubungi pembuat yang membuat tugas nya dengan menekan tombol
                                        hubungi penyedia di halaman tugas yang sudah di buat</p>
                                    <p>- Jika pembuat sudah mengirim tugas, Anda bisa melihat tugas tersebut pada
                                        sibeBar Tugas dan pilih Tugas anda dan ikuti langkah langkah di bawah</p>
                                    <ul>
                                        <li>
                                            * Di halaman tersebut anda bisa melihat tugas yang telah anda upload dan
                                            juga ada status tugas tersebut
                                        </li>
                                        <li>
                                            * pilih tugas yang anda upload
                                        </li>
                                        <li>
                                            * Pilihan Lihat tugas untuk melihat kembali tugas yang anda upload dan Lihat
                                            tugas yang di kirim untuk melihat tugas yang di selesaikan oleh Pembuat
                                        </li>
                                        <li>
                                            * Di pilihan Lihat tugas yang di kirim anda bisa mengunduh tugas yang telah
                                            terselesaikan dan memberikan status dengan menekan tombol yang tersedia
                                        </li>
                                    </ul>
                                    <p>- Maka telah selesai, Tugas anda terselaikan dengan baik dan sesuai dengan
                                        permintaan anda</p>
                                    <p>- Hubungi pihak admin jika terkena kendala atau saran dan masukan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>


    <!-- #/ container -->
</div>

<div class="footer">
    <div class="copyright">
        <p>Contact Admin <a href=mailto:storagerofif17drive@gmail.com>Hubungi kami</a> </p>
    </div>
</div>

</div>

@include('layouts.dashboard.footer')
