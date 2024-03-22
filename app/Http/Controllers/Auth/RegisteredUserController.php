<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AffectDemandMailable;
use App\Mail\CreateUserMailable;
use App\Mail\ResetPasswordMailable;
use App\Models\Agent;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\Usager;
use App\Models\TypeUsager;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Wildside\Userstamps\Listeners\Creating;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $typeUsager = TypeUsager::where('libelle_court', 'PP')->first();
        $request->validate([
            // 'id' => ['required'],
            'nip' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'String', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // creation de usager
        $usager = Usager::create([
            //'id' => Str::uuid(), // Génération d'un UUID pour l'utilisateur
            'nip' => $request->nip,
            'nom' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);

        $user = User::create([
            //'id' => Str::uuid(), // Génération d'un UUID pour l'utilisateur
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'usager_id' => $usager->uuid,
        ]);

        // dd($user);

        event(new Registered($user));
        event(new Registered($usager));
        event(new Registered($typeUsager));
        $user->usager_id = $usager->uuid;
        $usager->type_usager_id = $typeUsager->uuid;
        $user->save();
        $usager->save();
        Auth::login($user);

        // session()->flash('success', 'Registration successful!');

        return redirect(RouteServiceProvider::HOME)->with('success', 'Bienvenue !');;
    }

    /**
     * Handle an incoming registration request.
     *
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function storePersonneMorale(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         // 'id' => ['required'],
    //         'name' => ['required', 'string', 'max:255'],
    //         'ifu' => ['required', 'string', 'max:255'],
    //         'rccm' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //        'telephone' => ['required', 'String', 'max:255'],
    //         'siege_social' => ['required', 'string', 'max:255'],
    //         'boite_postale' => ['required', 'string', 'max:255'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);
    //     // dd($request);

    //     $user = User::create([
    //         //'id' => Str::uuid(), // Génération d'un UUID pour l'utilisateur
    //         'name' => $request->email,
    //         //'prenom' => $request->prenom,
    //         //'telephone' => $request->telephone,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     $usager = Usager::create([
    //         //'id' => Str::uuid(), // Génération d'un UUID pour l'utilisateur
    //         'nom_entreprise' => $request->name,
    //         'ifu' => $request->ifu,
    //         'rccm' => $request->rccm,
    //         'siege_social' => $request->siege_social,
    //         'boite_postale' => $request->boite_postale,
    //         'telephone' => $request->telephone,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     //$user->usager_id = $usager->uuid;

    //     // dd($user);

    //     event(new Registered($user));
    //     event(new Registered($usager));

    //     $user->usager_id = $usager->uuid;
    //     $usager->type_usager_id = TypeUsager::where('libelle_long', '=', 'Personne morale')->first()->uuid;
    //     $user->save();
    //     $usager->save();

    //     Auth::login($user);

    //     // session()->flash('success', 'Registration successful!');

    //     return redirect(RouteServiceProvider::HOME)->with('success', 'Bienvenue au Formulaire de demandes d\'avis technique d\'importation de produits chimique !');;
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storePersonneMorale(Request $request): RedirectResponse
    {
        $request->validate([
            // 'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'ifu' => ['required', 'string', 'max:255'],
            'rccm' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'telephone' => ['required', 'String', 'max:255'],
            'siege_social' => ['required', 'string', 'max:255'],
            'boite_postale' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request);

        $user = User::create([
            //'id' => Str::uuid(), // Génération d'un UUID pour l'utilisateur
            'name' => $request->email,
            //'prenom' => $request->prenom,
            //'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $usager = Usager::create([
            //'id' => Str::uuid(), // Génération d'un UUID pour l'utilisateur
            'nom_entreprise' => $request->name,
            'ifu' => $request->ifu,
            'rccm' => $request->rccm,
            'siege_social' => $request->siege_social,
            'boite_postale' => $request->boite_postale,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);

        $user->usager_id = $usager->uuid;

        // dd($user);

        event(new Registered($user));
        event(new Registered($usager));

        $user->usager_id = $usager->uuid;
        $usager->type_usager_id = TypeUsager::where('libelle_long', '=', 'Personne morale')->first()->uuid;
        $user->save();
        $usager->save();

        Auth::login($user);

        // session()->flash('success', 'Registration successful!');

        return redirect(RouteServiceProvider::HOME)->with('success', 'Bienvenue');;
    }




    //enregistrement des users metiers
    public  function userStore(Request $request)
    {

        $agent = Agent::where(['uuid' => $request->agent_id])->first();
        // dd($agent);

        $request->validate([
            // 'id' => ['required'],
            'agent_id' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        ]);
        // dd($request);

        $user = User::create([
            'name' => $agent->nom . ' ' . $agent->prenom,
            'agent_id' => $request->agent_id,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);

        $user->save();
        $demand = array(
            "email"  => $user->email,
            "name" => $agent->nom . ' ' . $agent->prenom,
            "password" => "12345678"
        );
        Mail::to($user->email)->send(new CreateUserMailable($demand));

        return redirect()->back()->with('success', 'Utilisateur créé avec succès !!');
    }





    // Liste des utilisateur
    // Recuperation de la list des demande concernant p001 Produi chimique
    public function listUsers(UserRepository $userRepository,  User $user)
    {
        // dd( StatutDemande::where('etat', '=', 'V')->first()->statut);
        $data = [
            "users" => $userRepository->all(),

            "services" => Service::all(),
            "agents" => Agent::all(),
            "roles" => Role::all(),
        ];

        //   dd($data['demandes'][0]->demandePiece);


        return view('backend.utilisateur.user_list', $data);
    }


    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required',

        ]);

        $agent = User::find($uuid);
        $agent->update([
            'name' => $request->input('name'),
            'role_id' => $request->input('role_id'),

        ]);

        return redirect()->route('user-list')->with('success', 'Utilisateur  mis à jour avec succès !');
    }

    public function resetPassword($id, Request $request){
        //dd(DB::table("Users")->where('uuid', $id));
        DB::table("Users")->where('uuid', $id)->update(['password' => Hash::make('12345678')]);

        $user = DB::table("Users")->where('uuid', $id)->first();
        $email = $user->email;
        $demand = array(
            "name" => $user->name,
            "password" => "12345678"
        );
        Mail::to($email)->send(new ResetPasswordMailable($demand));
        return redirect()->back()->with('success', 'Mot de passe réinitialiser avec succès !!');
    }
}
