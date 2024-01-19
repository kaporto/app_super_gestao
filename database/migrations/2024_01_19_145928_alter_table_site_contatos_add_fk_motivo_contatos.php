<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //cria a nova coluna
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');            
        });

        //atribui o valor de motivo_contato para a coluna nova motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //cria a fk e remove motivo_contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //cria motivo_contato e remove fk
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');            
        });

        //atribui o valor de motivo_contatos_id para a coluna nova motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        //remove a nova coluna
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');            
        });

    }
};
