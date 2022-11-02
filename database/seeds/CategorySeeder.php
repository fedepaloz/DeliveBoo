<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('res_categories');

        foreach($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category['name'];
            $new_category->image = $category['image'];
            $new_category->save();
        }
    }
}