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
            $categories_ids = $request->categories;

            if (count($categories_ids) === 1) {
                $restaurants = Category::find($categories_ids[0])->restaurants()->paginate(6);
            } else {
                $not_unique_restaurants = [];

                foreach ($categories_ids as $category) {
                    $single_category_restaurants = Category::find($category)->restaurants()->get();

                    foreach ($single_category_restaurants as $restaurant) {
                        $not_unique_restaurants[] = $restaurant->id;
                    }
                }

                $restaurants_ids_count_values = array_count_values($not_unique_restaurants);

                $unique_restaurants_ids = [];
                foreach ($restaurants_ids_count_values as $key => $count) {
                    if ($count === count($categories_ids)) {
                        $unique_restaurants_ids[] = $key;
                    }
                }

                $restaurants = Restaurant::whereIn('id', $unique_restaurants_ids)->paginate(6);
            }

        } else {
            $restaurants = Restaurant::with('categories')->paginate(6);
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

}
