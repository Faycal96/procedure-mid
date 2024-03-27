<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UpdatePWDRequest;
use App\Models\CategorieDemande;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
use App\Models\Procedure;
use App\Models\User;
use Carbon\Carbon;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create($code=null): View
    {
        $procedure=Procedure::where("code", $code)->first();
        $checkPeriode = false;
        if($procedure){
            $startDate = Carbon::parse($procedure->session_debut);
            $endDate = Carbon::parse($procedure->session_fin);
            $checkSession = Carbon::now()->between($startDate, $endDate);
            $checkPeriode = ($procedure->estperiodique && !$checkSession && $procedure->session_debut && $procedure->session_fin) ? 1 : 0;
        }

        $montantTH = CategorieDemande::where("code", "=", "TH" )->first()->montant;
        $montantTR1 = CategorieDemande::where("code", "=", "TR1" )->first()->montant;
        $montantTR2 = CategorieDemande::where("code", "=", "TR2" )->first()->montant;
        $montantTR3 = CategorieDemande::where("code", "=", "TR3" )->first()->montant;
        $montantEC = CategorieDemande::where("code", "=", "EC" )->first()->montant;

        $fraisTimbre = Procedure::where("code", "=", "P002" )->first()->frais_timbre;
        $fraisDossier = Procedure::where("code", "=", "P002" )->first()->frais_dossier;

        return view('auth.login', [
            'procedure' => $procedure,
            'checkSession' => $checkPeriode,
            "fraisTimbre"=>$fraisTimbre,
            "fraisDossier"=>$fraisDossier,
            "montantTH" =>$montantTH,
            "montantTR1" =>$montantTR1,
            "montantTR2" =>$montantTR2,
            "montantTR3" =>$montantTR3,
            "montantEC" =>$montantEC,
        ]);
    }


    /**
     * Display the createPWD view.
     */
    public function createPWD(): View
    {
        return view('auth.update-password');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
         $request->authenticate();

         $request->session()->regenerate();


        //  return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Bienvenue sur le formulaire de la demande ');

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(!is_null(Auth::user()->agent_id))
            {
                return redirect('/administration');
            }else{
                return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Bienvenue ');
        //  return  redirect('/');
             }
        }
        return back()->withErrors([
            'email' => 'email incorrects',
            'password' => 'Mot de passe incorrects',
        ])->onlyInput('email');

    }

    public function updatePassword(UpdatePWDRequest $request): RedirectResponse
    {
        // dd($request->all());

        Auth::user()->update([
            'must_reset_password' => 0,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/administration')->with('success', 'Mot de passe modifié avec succès !');
        // return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Mot de passe modifié avec succès !');


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
