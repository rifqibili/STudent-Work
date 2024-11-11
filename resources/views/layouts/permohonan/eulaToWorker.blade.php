@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="card">

            <div class="card-body">
                <div class="text-center">
                    <h1>Ingin Menjadi Pengerja?</h1> <br>

                </div>
                <p>- Penyedia yang ingin menjadi pengerja untuk melaksanakan tugas yang tersedia di web harus setuju dengan persyarata dan prasyaratan yang di tetapkan oleh Administrator</p>

                <p>- Penyedia yang ingin menjadi Pengerja tidak pernah Mengupload Tugas pada website</p>

                <p>- Jika Penyedia telah mengupload tugas Penyedia bisa menghapus Tugas nya terlebih dahulu</p>
                
                <a href="{{ route('toWorker.form') }}" class="text-center">
                    <h3>Tekan saya</h3>
                </a>
            </div>

        </div>
    </div>
</div>

@include('layouts.dashboard.footer')