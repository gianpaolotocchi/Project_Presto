<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->timestamps();
        });



$categories = ['Motori', 'Immobili', 'Elettronica', 'Arredamento e Casalinghi', 'Abbigliamento e Accessori', 'Sport e Tempo Libero', 'Giocattoli e Modellismo', 'Arte e Antiquariato', 'Libri, Film e Musica', 'Strumenti Musicali'];

foreach ($categories as $category) {
    Category::create(['name'=>$category]);
}


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
