<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

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

        foreach($items as $item) {
            $new_item = new Item();
            $new_item->name = $item['name'];
            $new_item->description = $item['description'];
            $new_item->price = $item['price'];
            $new_item->image = $item['image'];
            $new_item->visible = $item['visible'];
            $new_item->save();
        }
    }
}
