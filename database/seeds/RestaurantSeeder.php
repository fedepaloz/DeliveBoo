<?php

use App\User;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

        $res_data = config('res_data');

        foreach ($user_ids as $index => $id) {
            $restaurant = new Restaurant();
            $restaurant->user_id = $user_ids[$index];
            $restaurant->name = $res_data[$index]['name'];
            $restaurant->image = $res_data[$index]['image'];
            $restaurant->address = $res_data[$index]['address'];
            $restaurant->vat_number = $res_data[$index]['vat_number'];
            $restaurant->phone = $res_data[$index]['phone'];
            $restaurant->opening_time = $res_data[$index]['opening_time'];
            $restaurant->closure_time = $res_data[$index]['closure_time'];
            $restaurant->min_order = $res_data[$index]['min_order'];
            $restaurant->delivery_cost = $res_data[$index]['delivery_cost'];
            $restaurant->visible = $res_data[$index]['visible'];
            $restaurant->save();
        }
    }
}
