<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tableau de Bord | MEEA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{  asset('img/logo_meea.jpg')  }}" rel="icon">
  <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
  <script src="{{ asset('backend/assets/js/sweetalert2.all.min.js') }}"> </script
  <link href="{{ asset('backend/assets/css/sweetalert2.min.css') }}" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>



  <!-- Bootstrap4 Duallistbox -->
 <!-- MDB -->
 <script
 type="text/javascript"
 src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
 ></script>

  <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
rel="stylesheet"
/>





   @yield('css')
   @include('sweetalert::alert')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('administration') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo_meea.jpg') }}"  alt="">
        <span class="d-none d-lg-block"> </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger badge-number" title="Nombres de Nouvelles Demandes"> </span>
          </a><!-- End Notification Icon -->


        </li><!-- End Notification Nav -->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src=" {{ asset('backend/assets/img/user.png') }} " alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">I. Ouedraogo</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->usager->nom}}</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('administration') }}">
                  <i class="bi bi-grid"></i>

          <span>Tableaau de Bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#demandes-nav" data-bs-toggle="collapse"  href="{{ route('demandes-list') }}">
          <i class="bi bi-menu-button-wide"></i><span>Mes Demandes</span><i class="bi bi-folder bi-chevron-down ms-auto"></i>
        </a>

        <ul id="demandes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('demandes-list') }}">
                <i class="bi bi-circle"></i><span>Procédure Produit Chimique<span id="prog_produit_chimique" class="badge bg-warning text-white"> </span> </span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp0012-list') }}">
                <i class="bi bi-circle"></i><span>Procédure écotourisme <span id="prog_ecotourisme" class="badge bg-warning text-white"> </span> </span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp008-list')}}">
                <i class="bi bi-circle"></i><span>Procédure Déchets <span id="prog_dechet" class="badge bg-warning text-white"> </span> </span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp003-list')}}">
                <i class="bi bi-circle"></i><span>Procédure Permis Chasse <span id="prog_chasse" class="badge bg-warning text-white"> </span></span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp004-list')}}">
                <i class="bi bi-circle"></i><span>Procédure Détention <span id="prog_detention" class="badge bg-warning text-white"> </span></span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp0011-list')}}">
                <i class="bi bi-circle"></i><span>Procédure Permis Coupe <span id="prog_coupe" class="badge bg-warning text-white"> </span></span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp006-list')}}">
                <i class="bi bi-circle"></i><span>Procédure Certificats d'exemptions <span id="prog_exemption" class="badge bg-warning text-white"> </span></span>
              </a>
            </li>
            <li>
              <a href="{{ route('demandesp007-list')}}">
                <i class="bi bi-circle"></i><span>Procédure Homologation<span id="prog_homologation" class="badge bg-warning text-white"> </span></span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="bi bi-circle"></i><span>Procedure Agrement en Eau</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="bi bi-circle"></i><span>Procedure Permis circulation</span>
              </a>
            </li>

          </ul>

      </li><!-- End Components Nav -->





      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Utilisateur</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('agent-list') }}">
              <i class="bi bi-circle"></i><span>Agent</span>
            </a>
          </li>
          <li>
            <a href="{{ route('usager-list') }}">
              <i class="bi bi-circle"></i><span>Usager</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Parametre</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('procedure-list') }}">
              <i class="bi bi-circle"></i><span>Procedures</span>
            </a>
          </li>
          <li>
            <a href="{{ route('categorie-list') }}">
              <i class="bi bi-circle"></i><span>Categorie</span>
            </a>
          </li>
          <li>
            <a href=" {{ route('structure-list') }}">
              <i class="bi bi-circle"></i><span>Structure</span>
            </a>
          </li>

          <li>
            <a href=" {{ route('service-list') }}">
              <i class="bi bi-circle"></i><span>Service</span>
            </a>
          </li>
          <li>
            <a href="{{ route('piecejointe-list') }}">
              <i class="bi bi-circle"></i><span>Pieces Jointes</span>
            </a>
          </li>
          <li>
            <a href="{{ route('typeUsager-list') }}">
              <i class="bi bi-circle"></i><span>Type Usager</span>
            </a>
          </li>
          <li>
            <a href="{{ route('role-list') }}">
              <i class="bi bi-circle"></i><span>Role</span>
            </a>
          </li>

          {{-- <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Piece-Justificative</span>
            </a>
          </li> --}}
          <li>
            <a href=" {{ route('basejuridique-list') }}">
              <i class="bi bi-circle"></i><span>Base Juridique</span>
            </a>
          </li>
          {{-- <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Tarif</span>
            </a>
          </li> --}}
          <li>
            <a href=" {{ route('commune-list') }}">
              <i class="bi bi-circle"></i><span>Commune</span>
            </a>
          </li><li>
            <a href="{{ route('province-list') }}">
              <i class="bi bi-circle"></i><span>Province</span>
            </a>
          </li>
          <li>
            <a href="{{ route('region-list') }}">
              <i class="bi bi-circle"></i><span>Région</span>
            </a>
          </li>


        </ul>
      </li><!-- End Icons Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('title')

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MID</span></strong> 2023
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>



  <script>

function getNombreDemandeByProcedure(){
        $.ajax({
        type: 'GET',
        url: "/administration/statistique/nombreDemandeEncours",
        dataType: 'json',
        cache: false,
        success: function (result) {
                 switch ($.trim(result.status)) {
                     case "success":
                        $('#prog_produit_chimique').text(""+result.nbProchimique);
                        $('#prog_ecotourisme').text(""+ result.nbEcotourisme);
                        $('#prog_dechet').text(""+result.nbdechet);
                        $('#prog_detention').text(""+result.nbdetention);
                        $('#prog_coupe').text(""+result.nbcoupe);
                        $('#prog_exemption').text(""+result.nbce);
                        $('#prog_chasse').text(""+result.nbpchasse);
                        $('#prog_homologation').text(""+result.nbhomologation);

                         break;
                     default :
                          alert("Erreur");
                         break;
                 }
             },
            error: function () {
                alert("Erreur de chargement des données");
            }
        });
    }
	$(document).ready(function () {
        getNombreDemandeByProcedure();
    });



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

</body>

</html>
