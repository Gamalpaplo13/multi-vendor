<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/bootstrap-iconpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/modules/select2/dist/css/select2.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- NAVBAR Content -->
            @include('admin.layouts.navbar')


            <!-- SIDEBAR Content -->
            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">

                @yield('content')

            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Gamal Gaber
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('Backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('Backend/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('Backend/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>



    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('Backend/assets/js/page/index-0.js') }}"></script> --}}
    <!-- TemplateJS File -->
    <script src="{{ asset('Backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('Backend/assets/js/custom.js') }}"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                // @php
                    //     toastr()->error($error);
                    //
                @endphp
                // Display an info toast with no title
                toastr.error("{{ $error }}") //toastr js
            @endforeach
        @endif
    </script>
    <!-- Dynaic delete alert-->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault(); //make button not redirect to another page


                let deleteUrl = $(this).attr('href');
                //sweet alert
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        "Deleted!",
                                        data.message
                                    );
                                    window.location.reload();
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        "Can not delete!",
                                        data.message
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });
            })
        })
    </script>
    @stack('scripts')
</body>

</html>
