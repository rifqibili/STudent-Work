@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{ route('task.update',$task) }}" method="post"
                                enctype="multipart/form-data">
                                @method('patch')
                                @csrf

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Judul <span
                                            class="text-danger">:</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="judul"
                                            value="{{$task->judul}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Deskripsi <span
                                            class="text-danger">:</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="deskripsi" rows="5">{{$task->deskripsi}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Ketentuan <span
                                            class="text-danger">:</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="ketentuan" rows="5">{{$task->ketentuan}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Kategori <span
                                            class="text-danger"> : </span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="kategori_id">
                                            <option value="{{$task->kategori_id}}">{{$task->kategori->nama}}</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-currency">Gambar <span
                                            class="text-danger">:</span>
                                    </label>
                                    
                                   
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" name="gambar1"><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-currency">Gambar Tambahan <span
                                            class="text-danger">:</span>
                                    </label>
                                    
                                   
                                    <div class="col-lg-6">

                                        <label for="">Tidak harus : </label>
                                        <input type="file" class="form-control" name="gambar2">
                                        <input type="file" class="form-control" name="gambar3">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary confirm-btn">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.dashboard.footer')