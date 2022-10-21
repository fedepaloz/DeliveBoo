<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
        // $op_time = Carbon::parse('opening_time')->format('00:00');
        // $cl_time = Carbon::parse('closure_time')->format('00:00');
        $request->validate(
            [
                'name' => 'required|string|min:1|max:50|unique:restaurants',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,jpg,png',
                'vat_number' => 'required|string|min:11|max:11|unique:vat_number',
                'phone' => 'required|string|min:9|max:15|unique:phone',
                'address' => 'required|string|max:100|unique:address',
            ],
            [
                'name.required' => 'Il campo è obbligatorio',
                'name.min' => 'Il nome deve avere almeno :min caratteri',
                'name.max' => 'Lunghezza massima consentita :max caratteri',
                'name.unique' => "Esiste già un ristorante dal nome $request->name",
                // 'category_id.exists' => "Non esiste una categoria associabile",
                'image.image' => "Il file non e' del formato corretto",
                'image.mimes' => "Estensioni ammesse : .png, .jpg e .jpeg",
                'vat_number.min' => "Il campo Partita IVA deve avere :min caratteri",
                'vat_number.max' => "Il campo Partita IVA deve avere :max caratteri",
                'vat_number.required' => "Il campo è obbligatorio",
                'vat_number.unique' => "Partita IVA già esistente",
                'phone.unique' => "Telefono già esistente",
                'phone.required' => "Il campo è obbligatorio",
                'phone.min' => "Il campo Telefono deve avere :min caratteri",
                'phone.max' => "Il campo Telefono deve avere :max caratteri",
                'address.required' => "Il campo è obbligatorio",
                'address.max' => "Lunghezza massima consentita :max caratteri",
                'address.unique' => "Indirizzo già esistente",
            ]
        );
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
