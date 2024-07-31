<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LigdicashController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $client = new Client();

        $response = $client->post(env('LIGDICASH_API_URL'), [
            'json' => [
                'merchant' => env('LIGDICASH_MERCHANT_ID'),
                'apikey' => env('LIGDICASH_API_KEY'),
                'amount' => 1000, // Montant en francs CFA
                'currency' => 'XOF',
                'ref_command' => 'ITEM12345', // Référence de l'article
                'item_name' => 'Item Name',
                'env' => 'test',
                'name' => 'John Doe',
                'surname' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '221776543210',
                'url_return' => route('pay.success'),
                'url_cancel' => route('pay.cancel'),
                'url_callback' => route('pay.callback') // URL de notification de paiement
            ]
        ]);

        $paymentData = json_decode($response->getBody(), true);

        if (isset($paymentData['status']) && $paymentData['status'] == 'success') {
            return redirect($paymentData['payment_url']);
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'initialisation du paiement.');
        }
    }
}
