<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Execução de seeds de User (Usuário).
     */
    public function run(): void
    {
        /**
         * Criação de um usuário seed estático para trabalhar com os endereços
         */
        User::create([
            'id' => 11,
            'first_name' => 'Rômulo',
            'last_name' => 'Neves',
            'phone_number' => fake()->numberBetween(11, 99).fake()->numberBetween(900000000, 999999999),
            'email' => 'romulovneves@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
