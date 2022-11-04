<?php

use App\Models\Item;
use App\Models\Order;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $items = Item::orderBy('id')->pluck('id')->toArray();
        $restaurants = Restaurant::pluck('id')->toArray();

        for ($i = 0; $i < 500; $i++) {

            $order = new Order();
            $order->restaurant_id = Arr::random($restaurants);
            $order->first_name = $faker->firstName();
            $order->last_name = $faker->lastName();
            $order->email = $faker->safeEmail();
            $order->delivery_address = $faker->streetAddress();
            $order->total = $faker->randomFloat(2, 15, 99);
            $order->created_at = $faker->dateTimeBetween('-20 days', now());

            $order->save();

            for ($j = 0; $j < rand(2, 7); $j++) {
                $order->items()->attach(Arr::random($items), ['quantity' => rand(1, 5)]);
            }
        }
    }
}