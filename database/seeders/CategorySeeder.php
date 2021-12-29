<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creación de las 12 primeras categorías
        $category = Category::firstOrNew(['name' => 'categoria1']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria2']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria3']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria4']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria5']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria6']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria7']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria8']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria9']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria10']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria11']);
        if (!$category->exists) {
            $category->save();
        }
        $category = Category::firstOrNew(['name' => 'categoria12']);
        if (!$category->exists) {
            $category->save();
        }
    }
}
