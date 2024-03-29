<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Criação da tabela "addresses" através da execução dessa migration.
     * Relaciona todas as suas chaves estrangeiras às tabelas relacionadas.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');         
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                    ->references('id')
                    ->on('states');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities');
            $table->integer('street_id')->unsigned();
            $table->foreign('street_id')
                    ->references('id')
                    ->on('streets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
