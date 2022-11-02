<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function payment(Request $request)
    {
        $nonceFromTheClient = $request->payloadNonce;

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '754btzw6qy3x4bbx',
            'publicKey' => '2jffcv8pwnwxgvm5',
            'privateKey' => '664b02a1d9ea204e3b07285d766fe633',
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => '2000.00',
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {

            // # Tabella orders, tabella items (1-to-1 con orders)

            // Inseriamo l'ordine nel DB, svuotiamo il local storage, rimandiamo alla pagina di successo (usando res.data per scrivere il riepilogo ordine) e mandiamo l'email
        } else {
            // Mandiamo gli errori e li mostriamo in pagina
        }

        return response()->json($request);

    }
}
