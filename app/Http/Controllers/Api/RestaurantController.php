<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->categories) {
            $restaurants = Category::find($request->categories)->restaurants()->with('categories')->get();
            return response()->json($restaurants);
        } else {
            $restaurants = Restaurant::with(['categories'])->get();
        }
        return response()->json($restaurants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::with(['categories', 'items'])->find($id);
        return response()->json($restaurant);
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

    public function filter($category_id)
    {
        // $restaurants = Restaurant::all()->categories()->where('category_id', $category_id)->get();
        // return response()->json($restaurants);
        // $restaurants = App\Models\Restaurant::whereHas('comments', function (Builder $query) {
        //     $query->where('content', 'like', 'foo%');
        // }, '>=', 10)->get();
        $restaurants = Restaurant::whereHas('category_id', $category_id)->categories()->get();
        return response()->json($restaurants);
    }

}
