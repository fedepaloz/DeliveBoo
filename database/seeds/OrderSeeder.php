<?php

use App\Models\Item;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::orderBy('id')->pluck('id')->toArray();

        $order = new Order();
        $restaurants = Restaurant::pluck('id')->toArray();
        $order->restaurant_id = Arr::random($restaurants);
        $order->payment_method = 'Credit Card';
        $order->customer = 'Federico Palozzi';
        $order->email = 'fedepaloz@yahoo.com';
        $order->delivery_address = 'Via di qua, 55 - Roma';
        $order->total = 35.00;
        $order->status = 'pending';

        $order->save();

        $order->items()->attach($items);
    }
}
