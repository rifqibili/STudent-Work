@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Tugas</h4>
                        <div class="table-responsive">
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
                                    @foreach ($taskTables as $task)
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
                                            <td><span><a href="{{ route('task.create', $task) }}" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <button type="submit" class="btn btn-outline-info">Edit</button>                                                    </a>
                                                    <form action="{{ route('task.delete', $task) }}" method="POST"  class="delete-form">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger delete-btn" >Delete</button>
                                                    </form>

                                                    <a href="{{ route('task.show', $task->id) }}" data-toggle="tooltip"
                                                        data-placement="top">  <button type="submit" class="btn btn-outline-info">Lihat</button>
                                                    </a>
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
