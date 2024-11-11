<footer>
    <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->

        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | Website ini di buat sepenuh <i
                                        class="fa fa-heart" aria-hidden="true"></i> oleh Kelompok STudent Work
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </div>
</footer>
<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="{{ asset('courses-master') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('courses-master') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('courses-master') }}/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('courses-master') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('courses-master') }}/assets/js/wow.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/animated.headline.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="{{ asset('courses-master') }}/assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="{{ asset('courses-master') }}/assets/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="{{ asset('courses-master') }}/assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ asset('courses-master') }}/assets/js/jquery.counterup.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/waypoints.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/jquery.countdown.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="{{ asset('courses-master') }}/assets/js/contact.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/jquery.form.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/jquery.validate.min.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/mail-script.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('courses-master') }}/assets/js/plugins.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/main.js"></script>
<script src="{{ asset('courses-master') }}/assets/js/custom.min.js"></script>

{{-- modal box jquery --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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


    $(document).on('click', '.confirm-btn', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: "Apakah kamu ingin mengerjakannya?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Kerjakan",
            denyButtonText: `batalkan`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire("menuggu persetujuan!", "", "success");
                form.submit();
            } else if (result.isDenied) {
                Swal.fire("Batal memilih", "", "info");
            }
        });
    });

    $(document).on('click', '.select-worker-btn', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: "Apakah anda ingin memilih nya?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Pilih",
            denyButtonText: `batalkan`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire("Pengerja Telah di Pilih", "", "success");
                form.submit();
            } else if (result.isDenied) {
                Swal.fire("Batal memilih", "", "info");
            }
        });
    });
</script>

</script>
</body>

</html>
