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
        $names = ['Americano', 'Libanese', 'Vegetariano', 'Thai', 'Cinese', 'Sushi', 'Greca', 'Italiano', 'Pizza', 'Giapponese'];

        foreach ($names as $name) {
            $category = new Category();
            $category->name = $name;
            $category->save();
        }
    }
}
