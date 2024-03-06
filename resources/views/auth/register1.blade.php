<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MID</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel="stylesheet" href="./style.css">
    <!-- Vendor CSS Files -->
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

</head>

<body style="">
    <!-- partial:index.partial.html -->
    {{-- <div class="cotn_principal"> --}}
        {{-- <div class="cont_centrar"> --}}

            {{-- <div class="cont_login"> --}}
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">

                            <h2><i class="bi bi-person"></i></h2>
                            <h5> Personne physique</h5>
                            <p>Inscrivez vous ici si vous etes une personne physique</p>
                            <button class="btn_login" onclick="change_to_login()">Inscription</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2><i class="bi bi-buildings-fill"></i></h2>
                            <h5>Personne morale</h5>

                            <p>Inscrivez vous ici si vous etes une entreprise &nbsp; <br></p>

                            <button class="btn_sign_up" onclick="change_to_sign_up()">Inscription</button>
                        </div>
                    </div>
                </div>


                <div class="cont_back_info">
                    {{-- <div class="cont_img_back_grey">
                        <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d"
                            alt="" />
                    </div> --}}

                </div>
                <div class="cont_forms">
                    {{-- <div class="cont_img_back_">
                        <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d"
                            alt="" />
                    </div> --}}
                    <div class="cont_form_login">
                        <a href="#" onclick="hidden_login_and_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h5>Personne physique</h5>
                        <x-guest-layout>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Nom')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div>
                                    <x-input-label for="lastname" :value="__('Prénom')" />
                                    <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                                        :value="old('lastname')" required autofocus autocomplete="lastname" />
                                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Telephone number -->
                                <div>
                                    <x-input-label for="telephone" :value="__('Telephone')" />
                                    <x-text-input id="telephone" class="block mt-1 w-full" type="number"
                                        name="telephone" :value="old('telephone')" required autocomplete="telephone" />
                                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('login') }}" style="color: black">
                                        {{ __('Déja inscrit?') }}
                                    </a>
                                    <x-primary-button class="ml-4">
                                        {{ __('Inscription') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-guest-layout>

                        <button class="btn_login" onclick="change_to_sign_up()">Inscription</button>
                    </div>

                    <div class="cont_form_sign_up">
                        <a href="#" onclick="hidden_login_and_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h5>Personne morale</h5>
                        <x-guest-layout>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Nom de la societé')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div>
                                    <x-input-label for="lastname" :value="__('Numéro IFU')" />
                                    <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                                        :value="old('lastname')" required autofocus autocomplete="lastname" />
                                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Telephone number -->
                                <div>
                                    <x-input-label for="telephone" :value="__('Telephone')" />
                                    <x-text-input id="telephone" class="block mt-1 w-full" type="number"
                                        name="telephone" :value="old('telephone')" required autocomplete="telephone" />
                                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('login') }}">
                                        {{ __('Déja inscrit?') }}
                                    </a>
                                    <x-primary-button class="ml-4">
                                        {{ __('Inscription') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-guest-layout>

                        <!-- <button class="btn_sign_up" onclick="change_to_login()">Inscription</button> -->

                    </div>

                </div>

                {{--
            </div>
        </div>
    </div> --}}
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>
