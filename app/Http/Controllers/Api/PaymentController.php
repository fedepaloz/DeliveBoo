<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer.first_name' => 'required|string|max:20',
            'customer.last_name' => 'required|string|max:20',
            'customer.email' => 'required|string|max:50',
            'customer.address' => 'required|string|max:100',
            'order.*.name' => 'required|exists:items,name',
            'order.*.quantity' => 'required|numeric',
        ], [
            'customer.first_name.required' => 'Il campo Nome è obbligatorio',
            'customer.first_name.string' => 'Il campo Nome deve essere del testo',
            'customer.first_name.max' => 'Il campo Nome deve essere di massimo 20 caratteri',
            'customer.last_name.required' => 'Il campo Cognome è obbligatorio',
            'customer.last_name.string' => 'Il campo Cognome deve essere del testo',
            'customer.last_name.max' => 'Il campo Cognome deve essere di massimo 20 caratteri',
            'customer.email.required' => 'Il campo Email è obbligatorio',
            'customer.email.string' => 'Il campo Email deve essere del testo',
            'customer.email.max' => 'Il campo Email deve essere di massimo 50 caratteri',
            'customer.address.required' => 'Il campo Indirizzo è obbligatorio',
            'customer.address.string' => 'Il campo Indirizzo deve essere del testo',
            'customer.address.max' => 'Il campo Indirizzo deve essere di massimo 100 caratteri',
            'order.*.name.required' => 'Non possono essere inseriti piatti senza nome',
            'order.*.name.exists' => 'Il nome del piatto deve esistere nel database',
            'order.*.quantity.required' => 'La quantità dei piatti è obbligatoria',
            'order.*.quantity.numeric' => 'La quantità dei piatti deve essere numerabile',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $nonceFromTheClient = $request->payloadNonce;

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '754btzw6qy3x4bbx',
            'publicKey' => '2jffcv8pwnwxgvm5',
            'privateKey' => '664b02a1d9ea204e3b07285d766fe633',
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $request->total,
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
            $restaurant = Restaurant::select('name', 'image', 'delivery_cost')->find($request->resId);

            for ($i = 0; $i < count($order); $i++) {
                $new_order->items()->attach($order[$i]['id'], ['quantity' => $order[$i]['quantity']]);
            }

            // mail of confirmation of publication
            $mail = new NewOrderMail($new_order, $order, $restaurant);
            $costumer = $request->customer['email'];
            Mail::to($costumer)->send($mail);

            return response()->json($new_order);
        }

        $error = $result->transaction->processorResponseCode;

        if ($error === '2000') {
            return response()->json('La banca non è disposta ad accettare la transazione. Si prega di contattare la propria banca per maggiori dettagli.');
        }

        if ($error === '2001') {
            return response()->json("La carta non dispone di fondi sufficienti per coprire l'importo della transazione: si prega di ricaricare la carta o cambiare metodo di pagamento.");
        }

        if ($error === '2003') {
            return response()->json("La transazione supera il limite di attività dell'account. Si prega di contattare la propria banca per modificare i limiti del conto o utilizzare un metodo di pagamento diverso.");
        }

        if ($error === '2004') {
            return response()->json("La carta è scaduta. Si prega di utilizzare un metodo di pagamento diverso.");
        }

        if ($error === '2005') {
            return response()->json("Metodo di pagamento non valido o è stato commesso un errore di battitura nei dati della carta di credito. Si prega di correggere le informazioni di pagamento e di tentare di nuovo la transazione: se l'errore persiste, contattare la propria banca.");
        }

        if ($error === '2006') {
            return response()->json("Metodo di pagamento non valido o è stato commesso un errore di battitura nella data di scadenza della carta. Si prega di correggere le informazioni di pagamento e di tentare di nuovo la transazione: se l'errore persiste, contattare la propria banca.");
        }

        if ($error === '3000') {
            return response()->json('Problema con il network di pagamento. Si prega di ripetere la transazione: in caso di ripetuti errori, contattaci per maggiori informazioni.');
        }
    }
}
