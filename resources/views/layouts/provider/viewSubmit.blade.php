@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <h3>Tugas yang Dikirim</h3>
                @if ($task->submissions->isEmpty())
                    <strong class="text-center">Tugas Anda Belum Di Selesaikan Pengerja</strong>
                @else
                    @foreach ($task->submissions as $submission)
                        <div class="submission">
                            <p><strong>Pengerja:</strong> {{ $submission->user->name }}</p>
                            <p><strong>Deskripsi:</strong> {{ $submission->deskripsi }}</p>
                            @if ($submission->file_tugas)
                                <p><strong>File:</strong> <a
                                        href="{{ asset('storage/file/submit/' . $submission->file_tugas) }}"
                                        download>Unduh</a></p>
                            @endif
                            <p><strong>Status:</strong> {{ $submission->status }}</p>

                            @if ($submission->status === 'menunggu')
                                <form action="{{ route('submit.action', $submission->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="disetujui"
                                        class="btn btn-success">Terima</button>
                                    <button type="submit" name="status" value="ditolak"
                                        class="btn btn-danger">Tolak</button>
                                    <button type="submit" name="status" value="revisi" class="btn btn-warning">Minta
                                        Revisi</button>
                                </form>
                            @else
                                <p>Tugas ini sudah diproses dengan status:
                                    <strong>{{ ucfirst($submission->status) }}</strong></p>
                                <p>Status Tugas Anda Telah :
                                    <strong>{{ ucfirst($submission->task->status_work) }}</strong></p>
                            @endif
                        </div><br>
                    @endforeach
                @endif
            </div>
        </div>


    </div>
</div>

@include('layouts.dashboard.footer')
