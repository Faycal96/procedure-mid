
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portail | MEEA</title>
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



    <!--  -->
    <!-- ======= Top Bar ======= -->
    <x-topbar />

    <!-- ======= Header ======= -->
    <x-header />
<div class="container">
<div class="col-6 offset-3"> @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">

                            <h5 class="alert-heading">{{session('success')}}</h5>

                        </div>

                        <script>
                            setTimeout(function() {
                                document.querySelector('.alert.alert-success').style.display = 'none';
                            }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
                        </script>
                    @endif</div>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
         
        </div>
      </div>
    
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
    @if (Auth::user()->usager->typeUsager->libelle_court == "PP")
        <h3>Mes informations</h3>
        
        <form  method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data"  >
            @csrf

          <div class="form-group">
            <label class="col-lg-3 control-label">Nom:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nom" value="{{Auth::user()->usager->nom}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Prénom:</label>
            <div class="col-lg-8">
              <input name="prenom" class="form-control" type="text" value="{{Auth::user()->usager->prenom}}">
            </div>
          </div>
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="text" value="{{Auth::user()->email}}">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-md-3 control-label">Telepone:</label>
            <div class="col-md-8">
              <input name="telephone" class="form-control" type="text" value="{{Auth::user()->usager->telephone}}">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Enregistrer">
              <span></span>
              <input type="reset" class="btn btn-default" value="Retour">
            </div>
           <br>
           <br>

           
          </div>
        </form>

       
       <!-- <a href="{{ route('password.request') }}"><input type="button" class="btn btn-secondary" value="Changer mot de passe"></a>-->
       @else 

        <form  method="POST" action="{{route('profileMorale.update')}}" enctype="multipart/form-data"  >
            @csrf

          <div class="form-group">
            <label class="col-lg-3 control-label">Société</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nom_entreprise" value="{{Auth::user()->usager->nom_entreprise}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Ifu:</label>
            <div class="col-lg-8">
              <input name="ifu" class="form-control" type="text" value="{{Auth::user()->usager->ifu}}">
            </div>
          </div>
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Rccm:</label>
            <div class="col-lg-8">
              <input name="rccm" class="form-control" type="text" value="{{Auth::user()->usager->rccm}}">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-md-3 control-label">Email:</label>
            <div class="col-md-8">
              <input name="email" class="form-control" type="text" value="{{Auth::user()->email}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Telephone:</label>
            <div class="col-md-8">
              <input name="telephone" class="form-control" type="text" value="{{Auth::user()->usager->telephone}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Siège Social:</label>
            <div class="col-md-8">
              <input name="siege_social" class="form-control" type="text" value="{{Auth::user()->usager->siege_social}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Boite Postale:</label>
            <div class="col-md-8">
              <input name="boite_postale" class="form-control" type="text" value="{{Auth::user()->usager->boite_postale}}">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Enregistrer">
              <span></span>
              <input type="reset" class="btn btn-default" value="Retour">
            </div>
          </div>
        </form>
        @endif
      

       
      </div>
  </div>
</div>
<hr>
