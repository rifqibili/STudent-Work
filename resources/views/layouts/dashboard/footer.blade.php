<script src="{{ asset('quixlab-master') }}/plugins/common/common.min.js"></script>
<script src="{{ asset('quixlab-master') }}/js/custom.min.js"></script>
<script src="{{ asset('quixlab-master') }}/js/settings.js"></script>
<script src="{{ asset('quixlab-master') }}/js/gleek.js"></script>
<script src="{{ asset('quixlab-master') }}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{ asset('quixlab-master') }}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{ asset('quixlab-master') }}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{ asset('quixlab-master') }}/plugins/d3v3/index.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/topojson/topojson.min.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{ asset('quixlab-master') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{ asset('quixlab-master') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{ asset('quixlab-master') }}/plugins/chartist/js/chartist.min.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js">
</script>

<script src="{{ asset('quixlab-master') }}/js/dashboard/dashboard-1.js"></script>

<!-- Date Picker Plugin JavaScript -->
<script src="{{ asset('quixlab-master') }}/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="{{ asset('quixlab-master') }}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

{{-- Message Notify --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
    <script>
        toastr.success("{{Session::get('success')}}");
    </script>
    @elseif (Session::has('error'))
    <script>
        toastr.error("{{Session::get('error')}}");
    </script>
@endif

{{-- Sweeer ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function() {
        // SweetAlert untuk menghapus satu task
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');

            Swal.fire({
                title: "Anda Yakin?",
                text: "Menghapus Data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // SweetAlert untuk menghapus semua task yang di soft delete
    $(document).on('click', '.delete-all-btn', function(e) {
        e.preventDefault();
        var form = $('#delete-all-form');

        Swal.fire({
            title: "Anda Yakin?",
            text: "Menghapus Data!!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $(document).on('click', '.confirm-btn', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: "Apakah Anda ingin menyimpan perubahan?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Simpan",
        }).then((result) => {
                Swal.fire("Saved!", "", "success");
                form.submit();
        });
    })
</script>

</body>

</html>
