<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// ! POSSIBIBLE SOLUTION FOR USER CHECK IF ALREADY HAVE A RESTAURANT [change best article in restaurant] !
// $saveddata = DB::table('savearticle')->where('user_id', $userID && 'article_id', $bestarticle->id)->get();

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        return view('admin.restaurants.index', compact('restaurant'));
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
                'category_id' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png',
                'vat_number' => 'required|string|min:11|max:11',
                'phone' => 'required|string|min:9|max:15',
                'address' => 'required|string|min:5|max:100',
                'opening_time' => 'required',
                'closure_time' => 'required',
            ],
            [
                'name.required' => 'Il campo Nome Ristorante è obbligatorio',
                'name.min' => 'Il nome deve avere almeno :min caratteri',
                'name.max' => 'La lunghezza massima consentita del nome è :max caratteri',
                'name.unique' => "Esiste già un ristorante dal nome $request->name",
                'category_id.required' => "La categoria è obbligatoria",
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

            ]
        );

        $data = $request->all();
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->user_id = Auth::id();
        if (array_key_exists('image', $data)) {
            $img = Storage::disk('public')->put('restaurant_img', $data['image']);
            $restaurant->image = $img;
        };
        $restaurant->save();
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
