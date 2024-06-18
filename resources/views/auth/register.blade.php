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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/pool-mtdpce.css" rel="stylesheet">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    {{-- login style --}}
    <link rel="stylesheet" href="./style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>


    @livewireStyles
</head>

<body>

    <!--  -->
    <!-- ======= Top Bar ======= -->
    <x-topbar />

    <!-- ======= Header ======= -->
    <x-header />
    <!-- End Header -->

    <div class="content responsive">
        {{-- La partie de recherche --}}
        <div class="col-lg-6 offset-lg-3 animate__animated animate__fadeInUp">
            {{-- <form class="form-inline">


            </form><br> --}}
        </div>


        <!-- ======= Hero Section ======= -->

        <!-- End Hero -->

        <!-- ======= Breadcrumbs ======= -->
        <!-- End Breadcrumbs -->

        <!-- ======= sidebar Section ======= -->
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
  
    <main id="main">
  
      <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <h2 style="color: #1A33FF">INSCRIPTION</h2>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">

            <x-guest-layout>
                <div   id="physique" style="display:block" class="col-lg-6 offset-lg-3">
                    <i style="color: red;">Veuillez remplir bien les champs</i>
                    <form method="POST" action="{{ route('register') }}" style="border: 1px solid #1A33FF;
                        background: #ecf5fc; padding: 40px 50px 45px; width: 600px" >
                        @csrf
                            <div class="form-group mt-3">
                                <label for="nip"> NIP / Passport</label>
                                <input class="form-control" id="nip" type="text" name="nip"
                                    :value="old('nip')" required autofocus autocomplete="nip" />
                                <input-error :messages="$errors->get('nip')" class="mt-2" />
                           </div>
                            <div class="form-group mt-3">
                                <label for="name">Nom</label>
                                <input id="name" class="form-control" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
    
                            <div class="form-group mt-3">
                                <!-- Name -->
                                    <label for="prenom" >Prénom</label>
                                    <input class="form-control" id="lastname" type="text" name="prenom"
                                        :value="old('prenom')" required autofocus autocomplete="prenom" />
                                    <input-error :messages="$errors->get('prenom')" class="mt-2" />
                            </div>
                            <div class="form-group mt-3">
                                <!-- Email Address -->
                                
                                    <label for="email" >Email</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <input-error :messages="$errors->get('email')" class="mt-2" />
                         
                            </div>
                            <div class="form-group mt-3">
                                <!-- Telephone number -->
                                    <label for="telephone" >Téléphone</label>
                                    <input class="form-control" id="telephone" type="number"
                                    :value="old('telephone')" name="telephone" required autocomplete="telephone" />
                                    <input-error :messages="$errors->get('telephone')" class="mt-2" />
                             
                            </div>
                            <div class="form-group mt-3">
                                <!-- Password -->
                                    <label for="password" >Mot de passe</label>
                                    <input class="form-control" id="password" type="password"
                                        name="password" required autocomplete="new-password" />
                                    <input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group mt-3">
                                <!-- Confirm Password -->
                                    <label for="password_confirmation" >Confirmer mot de passe</label>
    
                                    <input class="form-control" id="password_confirmation" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    
                            </div>
    
                        <div class="flex items-center justify-end mt-2">
                            <a class="underline text-sm col  text-black"
                                href="{{ route('login') }}" style="color: black">
                                {{ __('Déjà inscrit?') }}
                            </a>
                            <x-primary-button class="col">
                                {{ __('Valider') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                </x-guest-layout>
            {{-- <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li id="physiq" class="filter-active">Personne Physique</li>
                <li id="moral" >Personne Morale</li>
              </ul>
            </div> --}}
          {{-- <div class="row portfolio-container">
            <x-guest-layout>
            <div   id="physique" style="display:block" class="col-lg-6 offset-lg-3">
                <i style="color: red;">Veuillez remplir bien les champs</i>
                <form method="POST" action="{{ route('register') }}" style="border: 1px solid #1A33FF;
                    background: #ecf5fc; padding: 40px 50px 45px; width: 600px" >
                    @csrf
                        <div class="form-group mt-3">
                            <label for="nip"> NIP / Passport</label>
                            <input class="form-control" id="nip" type="text" name="nip"
                                :value="old('nip')" required autofocus autocomplete="nip" />
                            <input-error :messages="$errors->get('nip')" class="mt-2" />
                       </div>
                        <div class="form-group mt-3">
                            <label for="name">Nom</label>
                            <input id="name" class="form-control" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group mt-3">
                            <!-- Name -->
                                <label for="prenom" >Prénom</label>
                                <input class="form-control" id="lastname" type="text" name="prenom"
                                    :value="old('prenom')" required autofocus autocomplete="prenom" />
                                <input-error :messages="$errors->get('prenom')" class="mt-2" />
                        </div>
                        <div class="form-group mt-3">
                            <!-- Email Address -->
                            
                                <label for="email" >Email</label>
                                <input class="form-control" id="email" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                                <input-error :messages="$errors->get('email')" class="mt-2" />
                     
                        </div>
                        <div class="form-group mt-3">
                            <!-- Telephone number -->
                                <label for="telephone" >Téléphone</label>
                                <input class="form-control" id="telephone" type="number"
                                :value="old('telephone')" name="telephone" required autocomplete="telephone" />
                                <input-error :messages="$errors->get('telephone')" class="mt-2" />
                         
                        </div>
                        <div class="form-group mt-3">
                            <!-- Password -->
                                <label for="password" >Mot de passe</label>
                                <input class="form-control" id="password" type="password"
                                    name="password" required autocomplete="new-password" />
                                <input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group mt-3">
                            <!-- Confirm Password -->
                                <label for="password_confirmation" >Confirmer mot de passe</label>

                                <input class="form-control" id="password_confirmation" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                                <input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>

                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm col  text-black"
                            href="{{ route('login') }}" style="color: black">
                            {{ __('Déjà inscrit?') }}
                        </a>
                        <x-primary-button class="col">
                            {{ __('Valider') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            </x-guest-layout>

            <x-guest-layout>
           <div id="morale" style="display:none">
                <i style="color: red;">Veuillez remplir bien les champs</i>
                <form method="POST" action="{{ route('register-personne-morale') }}" style="border: 1px solid #1A33FF;
                    background: #ecf5fc; padding: 40px 50px 45px; width: 600px">
                    @csrf
                        <div class="form-group mt-3">
                            <label for="nip"> Nom de la société</label>
                            <input class="form-control" id="name"  type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <input-error :messages="$errors->get('name')" class="mt-2" />
                       </div>
                        <div class="form-group mt-3">
                            <label for="name">Numéro IFU</label>
                            <input class="form-control" id="ifu"  type="text" name="ifu"
                                :value="old('ifu')" required autofocus autocomplete="ifu" />
                            <input-error :messages="$errors->get('ifu')" class="mt-2" />
                        </div>

                        <div class="form-group mt-3">
                            <!-- Name -->
                                <label for="prenom" >Numéro RCCM</label>
                                <input class="form-control" id="rccm"  type="text" name="rccm"
                                :value="old('rccm')" required autofocus autocomplete="rccm" />
                            <input-error :messages="$errors->get('rccm')" class="mt-2" />
                        </div>
                        <div class="form-group mt-3">
                            <!-- Email Address -->
                            
                                <label for="email" >Email</label>
                                <input class="form-control" id="email"  type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group mt-3">
                            <!-- Telephone number -->
                                <label for="telephone" >Téléphone</label>
                                <input class="form-control" id="telephone"  type="number"
                                name="telephone" :value="old('telephone')" required autocomplete="telephone" />
                            <input-error :messages="$errors->get('telephone')" class="mt-2" />
                         
                        </div>
                        <div class="form-group mt-3">
                            <!-- Password -->
                                <label for="password" >Siege social</label>
                                <input class="form-control" id="siege_social"  type="text" name="siege_social"
                                :value="old('siege_social')" required autofocus autocomplete="siege_social" />
                            <input-error :messages="$errors->get('siege_social')" class="mt-2" />
                        </div>
                    
                        <div class="form-group mt-3">
                            <!-- Confirm Password -->
                                <label for="boite_postale" >Boite postale</label>

                                <input class="form-control" id="boite_postale"  type="text" name="boite_postale"
                                :value="old('boite_postale')" required autofocus autocomplete="boite_postale" />
                            <input-error :messages="$errors->get('boite_postale')" class="mt-2" />

                        </div>

                        <div class="form-group mt-3">
                            <!-- Confirm Password -->
                                <label for="mot_de_passe" >Mot de passe</label>

                                <input class="form-control" id="password"  type="password"
                                name="password" required autocomplete="new-password" />

                            <input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>

                        <div class="form-group mt-3">
                            <!-- Confirm Password -->
                                <label for="password_confirmation" >Confirmer mot de passe</label>

                                <input class="form-control" id="password_confirmation"  type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>

                        

                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm col  text-black"
                            href="{{ route('login') }}" style="color: black">
                            {{ __('Déjà inscrit?') }}
                        </a>
                        <x-primary-button class="col">
                            {{ __('Valider') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            </x-guest-layout>
          </div> --}}
        <div >
      </section><!-- End Portfolio Section -->
  
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
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

    <script>
        let physiq = document.getElementById("physiq");
        let moral = document.getElementById("moral");
        let physique = document.getElementById("physique");
        let morale = document.getElementById("morale");
        physiq.addEventListener("click", () => {
        if(getComputedStyle(physique).display != "none"){
            physique.style.display = "none";
        } else {
            physique.style.display = "block";
            morale.style.display = "none";
        }
        })

        function togg(){
        if(getComputedStyle(morale).display != "none"){
            morale.style.display = "none";
        } else {
            morale.style.display = "block";
            physique.style.display = "none";
        }
        };
        moral.onclick = togg;
    </script>
  
  </body>

</html>
