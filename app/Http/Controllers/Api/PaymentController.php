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

            // Creo il nuovo ordine
            $new_order = new Order;
            $new_order->restaurant_id = $request->resId;
            $new_order->first_name = $request->customer['first_name'];
            $new_order->last_name = $request->customer['last_name'];
            $new_order->email = $request->customer['email'];
            $new_order->delivery_address = $request->customer['address'];
            $new_order->total = $request->total;
            $new_order->save();

            // Attacco gli items all'ordine con attach()

            $order = $request->order;

            $item_ids = [];
            $quantities = [];

            foreach ($order as $item) {
                $item_ids[] = $item['id'];
                $quantities[] = $item['quantity'];
            }

            $new_order->items()->attach($item_ids, ['quantity' => $quantities]);

            // # Tabella orders, tabella items (1-to-1 con orders)

            // Inseriamo l'ordine nel DB, svuotiamo il local storage, rimandiamo alla pagina di successo (usando res.data per scrivere il riepilogo ordine) e mandiamo l'email
        }

        return response()->json($new_order);

    }
}
