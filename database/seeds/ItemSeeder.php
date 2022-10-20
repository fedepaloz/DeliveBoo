<?php

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Restaurant;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = config('items');
        $restaurants = Restaurant::pluck('id')->toArray();

        foreach($items as $item) {
            $new_item = new Item();
            $new_item->restaurant_id = Arr::random($restaurants);
            $new_item->name = $item['name'];
            $new_item->description = $item['description'];
            $new_item->price = $item['price'];
            $new_item->image = $item['image'];
            $new_item->visible = $item['visible'];
            $new_item->save();
        }
    }
}
