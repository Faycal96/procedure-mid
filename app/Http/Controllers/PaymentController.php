<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Services\LigdicashService;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $ligdicash;

    public function __construct(LigdicashService $ligdicash)
    {
        $this->ligdicash = $ligdicash;
    }

    public function initiatePayment(Request $request)
    {
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $description = $request->input('description');

        $callbackUrl = route('ligdicash.callback');

        $response = $this->ligdicash->initiatePayment($amount, $currency, $description, $callbackUrl);

        if (isset($response['token'])) {
            Transaction::create([
                'token' => $response['token'],
                'transaction_id' => $response['transaction_id'],
                'status' => 'pending',
            ]);
            return response()->json($response);
        }

        return response()->json(['error' => 'L initiation du paiement a echoue'], 500);
    }

    public function handleCallback(Request $request)
    {
        $payload = $request->getContent();
        $event = json_decode($payload);

        if ($event === null) {
        Log::error('Le $event est null');
        return redirect()->back()->withErrors('Une erreur est survenue.');
        }

        // Vérifiez si la propriété 'token' existe dans l'objet $event
        if (!property_exists($event, 'token')) {
            Log::error('La propriété token n\'existe pas dans $event');
            return redirect()->back()->withErrors('Une erreur est survenue.');
        }

        // Si $event et la propriété token sont valides, accédez au token
    	$token = $event->token;
        $transaction_id = $event->transaction_id;
        $status = $event->status;

        $transaction = Paiement::where('token', $token)->first();
        

        if ($transaction && $transaction->status === "pending" && $status === "completed") {
            $transaction->status = "completed";
            $transaction->save();
            $demande = Demande::where('uuid', $transaction->demande_id)->first();
            $demande->paiement = 1;
            $demande->save();

            $this->processOrder($transaction);
        }
    }

    private function processOrder($transaction)
    {
        // Logique pour traiter la commande
        Log::info('Commande traitée pour l\'ID de transaction : ' . $transaction->uuid);
    }
}