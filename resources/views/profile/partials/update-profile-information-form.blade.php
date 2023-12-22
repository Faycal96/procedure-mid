<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informations sur le profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Mettez à jour les informations de profil et l'adresse électronique de votre compte.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <input type="hidden" name="uuid" value="{{ $user->uuid }}">

        <div class="row">
            <div class="col-6">
                <div>
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>
            <div class="col-6">
                <div>
                    <x-input-label for="prenom" :value="__('Prénom')" />
                    <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
                    <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="date_naissance" :value="__('Date Naissance')" />
                    <x-text-input id="date_naissance" name="date_naissance" type="Date" class="mt-1 block w-full" :value="old('date_naissance', $user->date_naissance)" required autofocus autocomplete="date_naissance" />
                    <x-input-error class="mt-2" :messages="$errors->get('date_naissance')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="lieu_naisssance" :value="__('Lieu de Naissance')" />
                    <x-text-input id="lieu_naisssance" name="lieu_naisssance" type="text" class="mt-1 block w-full" :value="old('lieu_naisssance', $user->lieu_naisssance)" required autofocus autocomplete="lieu_naisssance" />
                    <x-input-error class="mt-2" :messages="$errors->get('lieu_naisssance')" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="nom_pere" :value="__('Nom père')" />
                    <x-text-input id="nom_pere" name="nom_pere" type="text" class="mt-1 block w-full" :value="old('nom_pere', $user->nom_pere)" required autofocus autocomplete="nom_pere" />
                    <x-input-error class="mt-2" :messages="$errors->get('nom_pere')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="nom_mere" :value="__('Nom mère')" />
                    <x-text-input id="nom_mere" name="nom_mere" type="text" class="mt-1 block w-full" :value="old('nom_mere', $user->nom_mere)" required autofocus autocomplete="nom_mere" />
                    <x-input-error class="mt-2" :messages="$errors->get('nom_mere')" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="Profession" :value="__('Profession')" />
                    <x-text-input id="profession" name="profession" type="text" class="mt-1 block w-full" :value="old('profession', $user->profession)" required autofocus autocomplete="profession" />
                    <x-input-error class="mt-2" :messages="$errors->get('profession')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="Pays" :value="__('Pays')" />
                    <select name="pays" required id="selectMultiplePays"  :value="old('pays', $user->pays)" required autofocus autocomplete="pays"
                        class="mt-1 block w-full border-success">
                        {{-- <input type="text" placeholder="filtrer ici"> --}}
                        <option class="border-success" value="">Veuillez choisir un Pays
                        </option>
                        @foreach ( $pays as $pay)
                        <option {{ ($user->pays == utf8_decode($pay->libelle)? 'selected' : '') }} value="{{$pay->libelle  }}">{{utf8_decode($pay->libelle) }}</option>
                        @endforeach
                   </select>

                    <x-input-error class="mt-2" :messages="$errors->get('pays')" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="Domicile" :value="__('Domicile')" />
                    <x-text-input id="domicile" name="domicile" type="text" class="mt-1 block w-full" :value="old('domicile', $user->domicile)" required autofocus autocomplete="domicile" />
                    <x-input-error class="mt-2" :messages="$errors->get('domicile')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="adresse" :value="__('Adresse BF')" />
                    <x-text-input id="adresse_bf" name="adresse_bf" type="text" class="mt-1 block w-full" :value="old('adresse', $user->adresse_bf)" required autofocus autocomplete="adresse_bf" />
                    <x-input-error class="mt-2" :messages="$errors->get('adresse_bf')" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="telephone" :value="__('Telephone')" />
                    <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $user->telephone)" required autofocus autocomplete="telephone" />
                    <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="nom_entreprise" :value="__('Nom Entreprise')" />
                    <x-text-input id="nom_entreprise" name="nom_entreprise" type="text" class="mt-1 block w-full" :value="old('nom_entreprise', $user->nom_entreprise)" required autofocus autocomplete="nom_entreprise" />
                    <x-input-error class="mt-2" :messages="$errors->get('nom_entreprise')" />
                </div>

            </div>
        </div>

        <div>
            <x-input-label for="ifu" :value="__('Numero IFU')" />
            <x-text-input id="ifu" name="ifu" type="text" class="mt-1 block w-full" :value="old('ifu', $user->ifu)" required autofocus autocomplete="ifu" />
            <x-input-error class="mt-2" :messages="$errors->get('ifu')" />
        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="siege_social" :value="__('Siège Social')" />
                    <x-text-input id="siege_social" name="siege_social" type="text" class="mt-1 block w-full" :value="old('siege_social', $user->siege_social)" required autofocus autocomplete="siege_social" />
                    <x-input-error class="mt-2" :messages="$errors->get('siege_social')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="boite_postale" :value="__('Boite Postale')" />
                    <x-text-input id="boite_postale" name="boite_postale" type="text" class="mt-1 block w-full" :value="old('boite_postale', $user->boite_postale)" required autofocus autocomplete="boite_postale" />
                    <x-input-error class="mt-2" :messages="$errors->get('boite_postale')" />
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="rccm" :value="__('RCCM')" />
            <x-text-input id="rccm" name="rccm" type="text" class="mt-1 block w-full" :value="old('rccm', $user->rccm)" required autofocus autocomplete="rccm" />
            <x-input-error class="mt-2" :messages="$errors->get('rccm')" />
        </div>


        <div class="row">
            <div class="col">
                <div>
                    <x-input-label for="ifu" :value="__('Numero IFU')" />
                    <x-text-input id="ifu" name="ifu" type="text" class="mt-1 block w-full" :value="old('ifu', $user->ifu)" required autofocus autocomplete="ifu" />
                    <x-input-error class="mt-2" :messages="$errors->get('ifu')" />
                </div>
            </div>
            <div class="col">
                <div>
                    <x-input-label for="rccm" :value="__('RCCM')" />
                    <x-text-input id="rccm" name="rccm" type="text" class="mt-1 block w-full" :value="old('rccm', $user->rccm)" required autofocus autocomplete="rccm" />
                    <x-input-error class="mt-2" :messages="$errors->get('rccm')" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Un nouveau lien de verification vous ete envoyé a cette email.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

            </div>
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
