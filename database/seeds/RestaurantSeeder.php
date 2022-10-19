<?php

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
        $restaurants_ids = Restaurant::pluck('id')->toArray();

        $res_data = config('res_data');

        foreach ($restaurants_ids as $index=>$id) {
            $restaurant = new Restaurant();
            // $restaurant->name = $res_data[$index]['name'];
            // $restaurant->image = $res_data[$index]['image'];
            $restaurant->address = $faker->address();
            $restaurant->vat_number = $faker->randomNumber(11, true);
            $restaurant->phone = $faker->phoneNumber();
            $restaurant->save();
        }
    }
}
