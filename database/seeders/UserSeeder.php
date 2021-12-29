<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creación del primer usuario
        $user = User::firstOrNew(['email' => 'prueba@prueba.com']);
        if (!$user->exists) {
            $user->fill([
                'name' => 'Prueba',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10)
            ])->save();
        }
    }
}
