@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Kategori Terhapus</h4>
                        <div class="table-responsive">
                            <form action="{{ route('kategori.forceDeleteAll') }}" method="POST" id="delete-all-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-all-btn" >Hapus Permanen Keseluruhan</button>
                            </form>
                            <br>
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td>
                                                {{ $kategori->id }}
                                            </td>
                                            <td>
                                                {{ $kategori->nama }}
                                            </td>
                                            <td>
                                                <img src="{{asset('storage/gambar/kategori/'. $kategori->gambar)}}" alt="{{$kategori->judul}}" width="70px" height="70px">
                                            </td>
                                            <td><span><form action="{{ route('kategori.restore', $kategori->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success">Kembalikan</button>
                                            </form>                                               </a>
                                            <form action="{{ route('kategori.forceDelete', $kategori->id) }}" method="POST" style="display:inline;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger delete-btn">Hapus permanen</button>
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
