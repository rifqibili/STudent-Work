@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Tugas Terhapus</h4>
                        <div class="table-responsive">
                            <form action="{{ route('task.forceDeleteAll') }}" method="POST"  id="delete-all-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-all-btn" >Hapus Permanen Keseluruhan</button>
                            </form>
                            <br>
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Oleh</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>
                                                {{ $task->id }}
                                            </td>
                                            <td>
                                                {{ $task->judul }}
                                            </td>
                                            <td>
                                                <img src="{{asset('storage/gambar/task/'. $task->gambar1)}}" alt="{{$task->judul}}" width="70px" height="70px">
                                            </td>
                                            <td>
                                                {{ $task->user->name }}
                                            </td>
                                            <td>
                                                {{ $task->kategori->nama }}
                                            </td>
                                            <td><span><form action="{{ route('task.restore', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success">Kembalikan</button>
                                            </form>                                               </a>
                                            <form action="{{ route('task.forceDelete', $task->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus permanen</button>
                                            </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.footer')
