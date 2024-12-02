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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('cím');
            $table->text('leirás')->nullable(); //opcionális
            $table->string('image_path')->nullable(); // Kép elérési útvonala
            $table->foreignId('szerző_id')->constrained('users')->onDelete('cascade'); //A szerzőnek léteznie kell a users táblában!! Constrain!
            $table->boolean('is_publikált')->default(false);// publikálás állapota vagy publikus vagy piszkozat
            $table->timestamp('dátum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
