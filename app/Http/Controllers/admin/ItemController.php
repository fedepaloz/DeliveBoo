<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_restaurant = Restaurant::where('user_id', Auth::id())->first();
        $current_restaurant_items = Item::where('restaurant_id', $user_restaurant->id)->orderBy('name', 'asc')->get();
        return view('admin.items.index', compact('current_restaurant_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();

        return view('admin.items.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_restaurant_id = Restaurant::where('user_id', Auth::id())->value('id');

        $request->validate(
            [
                'name' => 'required|string|max:50|regex:/^[a-zA-Z0-9 ]+$/',
                'description' => 'nullable|string|max:255',
                'price' => 'required|numeric|gt:0',
                'image' => 'nullable|image|mimes:jpeg,jpg,png',
                'visible' => 'boolean',
            ],
            [
                'name.required' => 'Il nome è obbligatorio',
                'name.max' => 'Il nome non deve superare i :max caratteri',
                'name.regex' => "Il nome non può contenere caratteri speciali",
                'description.max' => "La descrizione non può superare i :max caratteri",
                'price.required' => 'Il prezzo è obbligatorio',
                'price.numeric' => 'Il prezzo deve essere un numero',
                'price.gt' => 'Il prezzo deve essere maggiore di 0',
                'image.image' => "Il file non e' del formato corretto",
                'image.mimes' => "Estensioni ammesse : .png, .jpg e .jpeg",
                'visible.boolean' => "Il campo 'Disponibile' accetta solo si o no",
            ],
        );
        $data = $request->all();
        $item = new Item();
        $item->restaurant_id = $current_restaurant_id;
        $item->fill($data);
        if (array_key_exists('image', $data)) {
            $image_url = Storage::put('item_img', $data['image']);
            $item->image = $image_url;
        }
        if (array_key_exists('visible', $data)) {
            $item->visible = true;
        } else {
            $item->visible = false;
        }
        $item->save();
        return redirect()->route('admin.items.show', $item)->with('message', 'Il piatto è stato creato correttamente')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $user_restaurant = Restaurant::where('user_id', Auth::id())->first();
        if ($item->restaurant_id !== $user_restaurant->id) {
            abort(404);
        }
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $user_restaurant = Restaurant::where('user_id', Auth::id())->first();
        if ($item->restaurant_id !== $user_restaurant->id) {
            return redirect()->route('admin.items.index')
                ->with('message', 'pagina non trovata')
                ->with('type', 'danger');
        }
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50|regex:/^[a-zA-Z0-9 ]+$/',
                'description' => 'nullable|string|max:255',
                'price' => 'required|numeric|gt:0',
                'image' => 'nullable|image|mimes:jpeg,jpg,png',
                'visible' => 'boolean',
            ],
            [
                'name.required' => 'Il nome è obbligatorio',
                'name.max' => 'Il nome non deve superare i :max caratteri',
                'name.regex' => "Il nome non può contenere caratteri speciali",
                'description.max' => "La descrizione non può superare i :max caratteri",
                'price.required' => 'Il prezzo è obbligatorio',
                'price.numeric' => 'Il prezzo deve essere un numero',
                'price.gt' => 'Il prezzo deve essere maggiore di 0',
                'image.image' => "Il file non e' del formato corretto",
                'image.mimes' => "Estensioni ammesse : .png, .jpg e .jpeg",
                'visible.boolean' => "Il campo 'Disponibile' accetta solo si o no",
            ],
        );

        $data = $request->all();

        if (array_key_exists('visible', $data)) {
            $item->visible = true;
        } else {
            $item->visible = false;
        }

        if (array_key_exists('image', $data)) {
            $image_url = Storage::put('item_img', $data['image']);
            $item->image = $image_url;
        }

        $item->update($data);

        return redirect()->route('admin.items.show', $item)
            ->with('message', 'Piatto modificato con successo')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index')->with('message', 'Il piatto è stato eliminato correttamente')->with('type', 'success');
    }
}
