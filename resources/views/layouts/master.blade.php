<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | Schoolmedia</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/modules/datatables/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/modules/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="../assets/modules/jquery-selectric/selectric.css">
    

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
</head>

@stack('page-styles')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.header')
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    @yield('content')
                </section>
                    @yield('modal')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Design By <a
                        href="https://schoolmedia.id/">Schoolmedia</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>
    
    @stack('before-scripts')
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>
    {{-- <script src="https://demo.getstisla.com/assets/modules/jquery.min.js"></script> --}}


    @include('sweetalert::alert')

    <!-- JS Libraies -->
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="../assets/modules/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/chart.min.js"></script>



    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    @stack('page-scripts')
    <script src="../assets/js/page/modules-datatables.js"></script>
    <script src="../assets/js/page/modules-sweetalert.js"></script>
    {{-- <script src="../assets/js/page/modules-chartjs.js"></script> --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        var $jnoc = jQuery.noConflict();
        $jnoc(document).ready(function () {
            $jnoc('#table-1').DataTable();
        });

    </script>
</body>

</html>
