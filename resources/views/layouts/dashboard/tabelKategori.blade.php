@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Kategori</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriTables as $kategori)
                                        <tr>
                                            <td>
                                                {{ $kategori->id }}
                                            </td>
                                            <td>
                                                {{ $kategori->nama }}
                                            </td>
                                            <td><span><a href="{{ route('kategori.edit', $kategori) }}" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <button type="submit" class="btn btn-outline-info">Edit</button>                                                    </a>
                                            <form action="{{ route('kategori.delete', $kategori) }}" method="POST"  class="delete-form">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger delete-btn" >Delete</button>
                                            </form>

                                            {{-- <a href="{{ route('kategori.show', $kategori->id) }}" data-toggle="tooltip"
                                                data-placement="top">  <button type="submit" class="btn btn-outline-info">Lihat</button>
                                            </a> --}}
                                        </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                        {{-- modal --}}
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail SkinCare</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalContent">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // jQuery function to handle modal show event
        $('#dataModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var dataId = button.data('id'); // Extract info from data-* attributes

            // AJAX request to fetch data based on ID
            $.ajax({
                url: '/data/' + dataId,
                method: 'GET',
                success: function(data) {
                    // Update modal content with the data fetched
                    $('#modalContent').text(data.details);
                },
                error: function() {
                    $('#modalContent').text('An error occurred while fetching data.');
                }
            });
        });
    </script>

@include('layouts.dashboard.footer')
