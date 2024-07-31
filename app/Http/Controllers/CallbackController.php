<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class CallbackController extends Controller
{
    public function paymentSuccess(Request $request)
    {
        // Gérer le succès du paiement
        return view('payment.success');
    }

    public function paymentCancel(Request $request)
    {
        // Gérer l'annulation du paiement
        return view('payment.cancel');
    }

    public function paymentCallback(Request $request)
    {
        // Gérer la notification de paiement
        $data = $request->all();
        
        // Vérifiez la signature et traitez les données de la notification
        // Exemple : Log des données pour le débogage
        Log::info('Ligdicash Callback Data: ', $data);

        // Traitement du paiement selon vos besoins
    }
}
