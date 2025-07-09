<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');                         
            $table->integer('duree');                            
            $table->string('classification')->nullable();        
            $table->string('realisateur')->nullable();           
            $table->text('acteurs')->nullable();                 
            $table->text('genres')->nullable();                  
            $table->string('affiche_url')->nullable();          
            $table->boolean('est_actif')->default(true);
            $table->date('date_sortie')->nullable();
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
