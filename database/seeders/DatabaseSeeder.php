<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creación de usuario y 12 categorías iniciales con faker
        // User::factory(1)->create();
        // Category::factory(12)->create();

        // Creación de usuario y 12 categorías iniciales con seed
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
