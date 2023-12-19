<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portail | MID</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/armoirie.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"> -->

    <!-- Vendor CSS Files -->
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" /> -->
    <link href="css/google-font1" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
      {{-- script pour flash --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>


    @livewireStyles
</head>

<body class="background">

    <!--  -->
    <!-- ======= Top Bar ======= -->
    <x-topbar />

    <!-- ======= Header ======= -->
    <x-header />
    <!-- End Header -->

    <div class="content">

        <div>
            @if ($message = Session::get('success'))
                 <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">{{session('success')}}</h4>
                 </div>
            @endif


        <script>
            setTimeout(function() {
                document.querySelector('.alert.alert-success').style.display = 'none';
            }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
        </script>

        <div class="col-lg-6 offset-lg-5 animate__animated animate__fadeInUp">
            {{-- <form class="form-inline " style="display:hidden;">

                <input class="form-control rounded-pill  border-success" id="filter" type="search"
                    placeholder="Recherche ..." aria-label="Search" autocomplete="off">

            </form> --}}

            <br>
        </div>

    @yield('contenuWelcome')
    @yield('contenuLogin')
    @yield('contact')
    @yield('faq')



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
    <script src="vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/waypoints/noframework.waypoints.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
    @livewireScripts

</body>

</html>
