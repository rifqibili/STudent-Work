@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 m-b-30">
                <h4 class="d-inline ">Tugas Tugas Anda</h4>
                <p></p>
                <div class="row">
                    @foreach ($task as $task)
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <img class="" src="{{ asset('storage/gambar/task/' . $task->gambar1) }}"
                                    alt="" height="250px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $task->judul }}</h5>
                                    <strong class="card-text">Status Tugas : {{ $task->status_work }}</strong>
                                    <br>
                                    <a href="{{ route('task.show', $task->id) }}"><button type="button"
                                            class="btn mb-1 btn-info">Lihat Tugas</button></a>
                                    <a href="{{ route('submit.view', $task->id) }}"><button type="button"
                                            class="btn mb-1 btn-success">Lihat Tugas Yang Di kirim</button></a>
                                    
                                            <form action="{{ route('task.delete', $task) }}" method="POST"  class="delete-form">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger delete-btn" >Hapus</button>
                                            </form>
                                    <p class="card-text"><small class="text-muted"></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>

@include('layouts.dashboard.footer')
