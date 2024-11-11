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
                            <form class="form-valide" action="{{ route('kategori.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Nama <span
                                            class="text-danger">:</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="nama"
                                            placeholder="Nama Kategori Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-currency">Gambar <span
                                            class="text-danger">:</span>
                                    </label>

                                    <div class="justify-content-center">
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img id="selectedImage"
                                                src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                                alt="example placeholder" style="width: 200px;" />
                                        </div>

                                        <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                            <label class="form-label text-white m-1" for="customFile1">Choose
                                                file</label>
                                            <input type="file" name="gambar"  class="form-control d-none" id="customFile1"
                                                onchange="displaySelectedImage(event, 'selectedImage')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
