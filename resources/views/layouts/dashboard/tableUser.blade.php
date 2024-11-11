@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Akun</h4>
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
                                    @foreach ($userTables as $user)
                                        <tr>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->role }}
                                            </td>
                                            <td><span
                                            <form action="{{ route('user.delete', $user) }}" method="POST"  class="delete-form">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger delete-btn" >Hapus</button>
                                            </form>

                                            <a href="{{ route('user.show', $user->id) }}" data-toggle="tooltip"
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
