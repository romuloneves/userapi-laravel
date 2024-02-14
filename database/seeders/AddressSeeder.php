<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Execução de seeders de Address (Endereço).
     */
    public function run(): void
    {
        /**
         * Criação de três seeders estáticos de endereço relacionados ao usuário estático (id 11)
         */
        
        # Rua Professora Emília Esteves - Centro - São José do Vale do Rio Preto - RJ
        Address::create([
            'name' => 'Endereço #1',
            'user_id' => 11, // Rômulo Neves
            'state_id' => 19, // Rio de Janeiro
            'city_id' => 337, // São José do Vale do Rio Preto
            'street_id' => 275 // Rua Professora Emília Esteves - Centro
        ]);
        
        # Rua José Fabro  - Centro - Novo Horizonte - SP
        Address::create([
            'name' => 'Endereço #2',
            'user_id' => 11, // Rômulo Neves
            'state_id' => 25, // São Paulo
            'city_id' => 463, // Novo Horizonte
            'street_id' => 202 // Rua José Fabro  - Centro
        ]);
        
        # Rodovia Presidente Dutra - Prata - Nova Iguaçu - RJ
        Address::create([
            'name' => 'Endereço #3',
            'user_id' => 11, // Rômulo Neves
            'state_id' => 19, // Rio de Janeiro
            'city_id' => 336, // Nova Iguaçu
            'street_id' => 171 // Rodovia Presidente Dutra - Prata
        ]);
    }
}
