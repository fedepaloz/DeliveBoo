<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $items = Item::all();
        return view('admin.items.index', compact('items'));
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
                'name' => 'required|string|min:1|unique:items',
                'description' => 'string',
                'price' => 'numeric',
                'image' => 'nullable|image|mimes:jpeg,jpg,png',
                // TODO [REQUIRED]
                'visible' => 'required',
            ],
            [
                'name.required' => 'Il titolo è obbligatorio',
                'name.min' => 'Il titolo deve avere almeno :min caratteri',
                'name.unique' => "Esiste già un piatto dal nome $request->name",
                'image.image' => "Il file non e' del formato corretto",
                'image.mimes' => "Estensioni ammesse : .png, .jpg e .jpeg",
                'visible.required' => "Inserisci almeno uno dei campi",
            ],
        );
        $data = $request->all();
        $item = new Item();
        $item->restaurant_id = $current_restaurant_id;
        $item->fill($data);
        if (array_key_exists('image', $data)) {
            $img= Storage::disk('public')->put('restaurant_img', $data['image'] );
            $item->image = $img;
        };
        $item->save();
        return redirect()->route('admin.items.show', $item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $current_restaurant_items = Item::where('restaurant_id', Auth::id())->get();
        // $item = Item::all();
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
        $data = $request->all();
                // if (array_key_exists('image', $data)) {
        //     if($item->image) Storage::delete($item->image);
        //     $img= Storage::disk('public')->put('restaurant_img', $data['image'] );
        //     $item->image = $img;
        // };
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
    return redirect()->route('admin.items.index');
    }
}
