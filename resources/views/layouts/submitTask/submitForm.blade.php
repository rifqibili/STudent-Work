@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')


<div class="content-body">
    <div class="container-fluid">
        <h2>Formulir Mengumpulkan Tugas</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('submit.task', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="description">Deskripsi Tugas  (opsional):</label>
                <textarea name="deskripsi" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">Unggah File:</label>
                <input type="file" name="file_tugas" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Kirim Tugas</button>
        </form>
    </div>
</div>

@include('layouts.dashboard.footer');