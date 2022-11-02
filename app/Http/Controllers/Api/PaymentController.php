<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    public function payment(Request $request)
    {
        $nonceFromTheClient = $_POST["payment_method_nonce"];
        /* Use payment method nonce here */
        
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '754btzw6qy3x4bbx',
            'publicKey' => '2jffcv8pwnwxgvm5',
            'privateKey' => '664b02a1d9ea204e3b07285d766fe633',
        ]);
        $result = $gateway->transaction()->sale([
            'amount' => '4001.00',
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
              'submitForSettlement' => True
            ]
          ]);

        $clientToken = $gateway->clientToken()->generate();
        return response()->json($result);
    }
}
