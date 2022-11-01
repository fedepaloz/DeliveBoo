<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function token()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '754btzw6qy3x4bbx',
            'publicKey' => '2jffcv8pwnwxgvm5',
            'privateKey' => '664b02a1d9ea204e3b07285d766fe633',
        ]);

        $clientToken = $gateway->clientToken()->generate();
        return response()->json($clientToken);
    }
}
