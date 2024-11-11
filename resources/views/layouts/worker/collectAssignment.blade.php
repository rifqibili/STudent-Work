@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 m-b-30">

                <p></p>
                @if ($task->isNotEmpty())
                <div class="row">
                    @foreach ($task as $task)
                        @if ($task->trashed())
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Data telah dihapus</h5>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img src="{{ asset('storage/gambar/task/' . $task->task->gambar1) }}" alt="" height="250px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $task->task->judul }}</h5>
                                        <p class="card-text">Status Tugas: {{ $task->task->status_work }}</p>
                                        @if (!$task->task->isCompleted())
                                            <a href="{{ route('submit.form', $task->task->id) }}">
                                                <button type="button" class="btn mb-1 btn-success">Kumpulkan Tugas</button>
                                            </a>
                                        @else
                                            <a href="{{ route('task.show', $task->task->id) }}">
                                                <button type="button" class="btn mb-1 btn-primary">Lihat Tugas</button>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <h1 class="text-center">Tidak Ada Tugas Yang Anda Ambil</h1>
            @endif
            
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.footer')