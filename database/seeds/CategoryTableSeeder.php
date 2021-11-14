<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $is_exist = Category::all();

        if (!$is_exist->count()) {
            $category = new Category();
            $category->name = 'Bahasa';
            $category->slug = 'bahasa';
            $category->icon_class = 'fa-chart-line';
            $category->is_active = 1;
            $category->save();

            $category = new Category();
            $category->name = 'Business';
            $category->slug = 'business';
            $category->icon_class = 'fa-business-time';
            $category->is_active = 1;
            $category->save();

            $category = new Category();
            $category->name = 'IT & Software';
            $category->slug = 'IT-software';
            $category->icon_class = 'fa-laptop';
            $category->is_active = 1;
            $category->save();

           

            
        }
    }
}
