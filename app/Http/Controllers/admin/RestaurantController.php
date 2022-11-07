<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Prendo il ristorante associato all'utente
        $restaurant = Restaurant::where('user_id', Auth::id())->first();

        //Prendo l'array con le categorie del ristorante
        $res_categories = $restaurant->categories->toArray();
        ///Creo la stringa di categorie da mostrare in pagina
        $categories_string = '';
        foreach ($res_categories as $index => $category) {
            if ($index === array_key_last($res_categories)) {
                $categories_string .= $category['name'];
            } else {
                $categories_string .= $category['name'] . ' - ';
            }
        };

        // Passo a @index il ristorante e la stringa
        return view('admin.restaurants.index', compact('restaurant', 'categories_string'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //se l'utente loggato ha gia' creato un ristorante non permettere ulteriore creazione
        //altrimenti permetti
        // if(Auth::id() ===  )
        $categories = Category::all();
        $restaurant = new Restaurant();
        return view('admin.restaurants.create', compact('restaurant', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:1|max:50',
                'categories_ids' => 'required|exists:categories,id',
                'image' => 'nullable|mimes:jpeg,jpg,png',
                'vat_number' => 'required|string|min:11|max:11',
                'phone' => 'required|string|min:9|max:15',
                'address' => 'required|string|min:5|max:100',
                'opening_time' => 'required',
                'closure_time' => 'required',
                'min_order' => 'required|numeric|gte:0',
                'delivery_cost' => 'required|numeric|gt:0',
            ],
            [
                'name.required' => 'Il campo Nome Ristorante è obbligatorio',
                'name.min' => 'Il nome deve avere almeno :min caratteri',
                'name.max' => 'La lunghezza massima consentita del nome è :max caratteri',
                'name.unique' => "Esiste già un ristorante dal nome $request->name",
                'categories_ids.required' => "Selezionare almeno una categoria",
                'categories_ids.exists' => 'Le categorie selezionate non esistono',
                'image.mimes' => "Estensioni ammesse : .png, .jpg e .jpeg",
                'vat_number.min' => "Il campo Partita IVA deve avere :min caratteri",
                'vat_number.max' => "Il campo Partita IVA deve avere :max caratteri",
                'vat_number.required' => "Il campo Partita IVA è obbligatorio",
                'vat_number.unique' => "Partita IVA già esistente",
                'phone.unique' => "Telefono già esistente",
                'phone.required' => "Il campo Telefono è obbligatorio",
                'phone.min' => "Il campo Telefono deve avere :min caratteri",
                'phone.max' => "Il campo Telefono deve avere :max caratteri",
                'address.required' => "Il campo Indirizzo è obbligatorio",
                'address.max' => "Lunghezza massima consentita :max caratteri",
                'address.min' => "Lunghezza minima consentita :min caratteri",
                'address.unique' => "Indirizzo già esistente",
                'opening_time.required' => "Il campo Orario di apertura è obbligatorio",
                'closure_time.required' => "Il campo Orario di chiusura è obbligatorio",
                'min_order.required' => "Il campo 'Ordine minimo' non può essere vuoto",
                'min_order.gte' => "Il campo 'Ordine minimo' deve essere maggiore o uguale a 0",
                'delivery_cost.required' => "Il campo 'Spese di consegna' non può essere vuoto",
                'delivery_cost.gt' => "Il campo 'Spese di consegna' deve essere maggiore di 0",
            ]
        );

        $data = $request->all();
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->user_id = Auth::id();
        if (array_key_exists('image', $data)) {
            $image = Storage::put('restaurant_img', $data['image']);
            $restaurant->image = $image;
        }
        $restaurant->save();
        if (array_key_exists('categories_ids', $data)) {
            $restaurant->categories()->attach($data['categories_ids']);
        }

        return redirect()->route('admin.restaurants.index', $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
