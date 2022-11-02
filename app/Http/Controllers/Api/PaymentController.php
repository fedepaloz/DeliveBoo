<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
            'amount' => '100.00',
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {

            $new_order = new Order;
            $new_order->restaurant_id = $request->resId;
            $new_order->first_name = $request->customer['first_name'];
            $new_order->last_name = $request->customer['last_name'];
            $new_order->email = $request->customer['email'];
            $new_order->delivery_address = $request->customer['address'];
            $new_order->total = $request->total;
            $new_order->save();

            $order = $request->order;

            for ($i = 0; $i < count($order); $i++) {
                $new_order->items()->attach($order[$i]['id'], ['quantity' => $order[$i]['quantity']]);
            }

            return response()->json($new_order);
        }

    }
}
