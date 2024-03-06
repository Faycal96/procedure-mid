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
    <link
        {{-- href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" --}}
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>


    @livewireStyles
</head>

<body class="">
    <!--  -->
    <!-- ======= Top Bar ======= -->
    <x-topbar />

    <!-- ======= Header ======= -->
    <x-header />
    <!-- End Header -->

    <div class="content">
        <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container">

          <div class="row no-gutters">
            <style>
                .single{
                    background: rgba(0,99,207,.08);
                    padding: 10px 25px;
                    border-radius: 5px;
                    margin: 0 25px 32px 0;
                    width: -moz-fit-content;
                    width: fit-content;
                    color: #0063cf !important;
                }
            </style>

            <div class="col-lg-7 box featured">
              <h5 class="single">Demande d'autorisation de gestion des dechets</h5>
              <p>A propos de ce service

                La Demande d'autorisation de gestion des dechets est une autorisation officielle officiel qui certifie le lieu de résidence d'une personne au moment de la demande. Le dossier est traité par les autorités de l'Administration Locale au niveau du Secteur.

                </p>
                <div style=" margin: 18px 0 33px;">

                        <i class="bi bi-clock" style="display: inline-block;
                        width: 24px;
                        height: 24px;
                        fill: none;
                        stroke: currentColor;
                        stroke-width: 2px;
                        stroke-linecap: round;
                        stroke-linejoin: round;"></i>
                        <b>Délai de traitement : 1 Jour</b>


                        <i class="bi bi-tag" style="display: inline-block;
                        width: 24px;
                        height: 24px;
                        fill: none;
                        stroke: currentColor;
                        stroke-width: 2px;
                        stroke-linecap: round;
                        stroke-linejoin: round;"></i>
                        <b>Montant à payer : 1,500 XOF</b><br><br>


                        <i class="bi bi-home"></i>
                        <b style="margin-left:0px">Fourni par</b> <span style="border: 1px solid #0063cf;
                        color: #0063cf;
                        padding: 0 0.5em;
                        border-radius: 5px;">DGPE</span><br><br>


                </div>
              <!-- <h4>$29<span>per month</span></h4> -->


              {{-- La partie des descriptions --}}
            <div class="row">

                <h5>
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Voir baseJurudique</a>
                  <a href="#" class="btn btn-primary">Voir Pièces à Fournir</a>
                  <a href="#">Voir Pieces à fournir</a>
                </h5>

                <!-- debut Modal pour afficher les details -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Demande d'autorisation de transport/transfert d'un animal sauvage ou de
                                    trophées (certificat d'origine)</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore tempore voluptatum porro unde ex ad
                                numquam
                                quibusdam cumque ullam iusto, voluptates commodi, sequi illum reiciendis eius tempora, ipsa maxime
                                corporis.

                            </div>
                            <div class="modal-footer">
                                <x-secondary-button class="ml-4">
                                    {{ __('Fermer') }}
                                </x-secondary-button>
                                <x-primary-button class="ml-4" href="/demandes" wire:navigate>
                                    {{ __('Postuler') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin Modal pour afficher les details -->
            </div>

              {{-- <a href="#" class="buy-btn">Buy Now</a> --}}
            </div>

            {{-- La partie de connexion --}}
            <div class="col-lg-5  box">
                <h2>Connexion</h2>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 form-control " type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 form-control" type="password"
                            name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se
                                souvenir de moi') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-dark"
                            href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié?') }}
                        </a>
                        @endif

                        <x-primary-button style="padding: 6px 6px;" class="ml-3">
                            {{ __('Se Connecter') }}
                        </x-primary-button>
                    </div>
                    <a class="mt-5 underline text-sm text-dark dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="/register">
                    {{ __("S'inscrire") }}
                </a>
                </form>


            </div>

          </div>

        </div>
      </section><!-- End Pricing Section -->
                               {{--
                                <div class="card card_login">
                                    <h2>Connexion</h2>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 form-control " type="email" name="email"
                                                :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="block mt-1 form-control" type="password"
                                                name="password" required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                    name="remember">
                                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se
                                                    souvenir de moi') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600
                                             dark:text-gray-400 hover:text-gray-900
                                              dark:hover:text-gray-100 rounded-md focus:outline-none
                                               focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                                                dark:focus:ring-offset-gray-800"
                                                href="{{ route('password.request') }}">
                                                {{ __('Mot de passe oublié?') }}
                                            </a>
                                            @endif

                                            <x-primary-button style="padding: 6px 6px;" class="ml-3">
                                                {{ __('Se Connecter') }}
                                            </x-primary-button>
                                        </div>
                                    </form>

                                    <a class="mt-5 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="/register">
                                        {{ __("S'inscrire") }}
                                    </a>
                                </div> --}}


            </main><!-- End #main -->
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
