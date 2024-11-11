@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Permintaan</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <td>
                                                {{ $request->id }}
                                            </td>
                                            <td>
                                                {{ $request->name }}
                                            </td>
                                            <td>
                                                {{ $request->email }}
                                            </td>
                                            <td>
                                                {{ $request->role }}
                                            </td>
                                            <td>
                                                <form action="{{ route('approve.toWorker', $request->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Setujui</button>
                                                </form>
                                                <form action="{{ route('rejected.toWorker', $request->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                                </form>
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
