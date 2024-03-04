<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portail | MEEA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

     <!-- Favicons -->
    <link href="{{ asset('img/logo_meea.jpg')  }}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('img/armoirie.png')  }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png')  }}" rel="apple-touch-icon">

     <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" /> -->
    <link href="{{ asset('css/google-font1') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->


    @livewireStyles
    @yield('css')

</head>

<body class="background">

    <!--  -->
    <!-- ======= Top Bar ======= -->
    <x-topbar />

    <!-- ======= Header ======= -->
    <x-header />
    <!-- End Header -->

    <div class="content">

        <p> @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="alert-heading">{{session('success')}}</h5>

            </div>

            <script>
                setTimeout(function() {
                    document.querySelector('.alert.alert-success').style.display = 'none';
                }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
            </script>
        @endif</p>

        {{-- <div class="col-lg-6 offset-lg-5 animate__animated animate__fadeInUp">
            <form class="form-inline">
                <input class="form-control rounded-pill  border-success" id="filter" type="search"
                    placeholder="Recherche ..." aria-label="Search" autocomplete="off">

            </form><br>
        </div> --}}

        @yield('content')



    </div>
    <!-- ======= Footer ======= -->
    <x-footer />
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        $("#filter").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mycard > div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>

  @yield('script')
    @livewireScripts

</body>

</html>
