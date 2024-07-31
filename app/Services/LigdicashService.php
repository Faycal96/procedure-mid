<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Ligdicash\Ligdicash;
use Illuminate\Support\Str;
use LigdicashLigdicash;

class LigdicashService
{
    protected $apiUrl;
    protected $apiKey;
    protected $return_url;
    protected $cancel_url;
    protected $callback_url;

    public function __construct()
    {
        $this->apiToken = config('services.ligdicash.api_token');
        $this->apiKey = config('services.ligdicash.api_key');
        $this->return_url = config('services.ligdicash.return_url');
        $this->cancel_url = config('services.ligdicash.cancel_url');
        $this->callback_url = config('services.ligdicash.callback_url');
    }

    public function initiatePayment($invoiceInfo)
    {

        $client = new Ligdicash([
            "api_key" =>$this->apiKey ,
            "auth_token" => $this->apiToken,
            "platform" => "live"
        ]);

        $invoice = $client->Invoice([
            "currency" => "XOF",
            "description" => $invoiceInfo['description'],
            "store_name" => "MID",
            "store_website_url" => env('APP_URL')
        ]);

        # Ajouter des éléments(produit, service, etc) à la facture
        $invoice->addItem([
            "name" => $invoiceInfo['name'],
            "description" => $invoiceInfo['description'],
            "quantity" => $invoiceInfo['quantity'],
            "unit_price" => $invoiceInfo['unit_price']
        ]);
        //$transaction_id = (string) Str::uuid();
        $response = $invoice->payWithRedirection([
            "return_url" => $this->return_url,
            "cancel_url" =>  $this->cancel_url,
            "callback_url" => $this->callback_url,
            "custom_data" => [
                "transaction_id" => $invoiceInfo['transaction_id'],
            ]
        ]);

        return $response;
    }

    public function verifyPayment($token)
    {
        $client = new Ligdicash([
            "api_key" =>$this->apiKey ,
            "auth_token" => $this->apiToken,
            "platform" => "live"
        ]);

        $transaction = $client->getTransaction([
            "token" => $token,
        ]);

        return $transaction;
    }
}