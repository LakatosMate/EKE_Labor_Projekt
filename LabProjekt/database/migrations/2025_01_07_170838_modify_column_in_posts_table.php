<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Rename columns to their English counterparts
            $table->renameColumn('cím', 'title'); // Rename 'cím' to 'title'
            $table->renameColumn('leirás', 'description'); // Rename 'leirás' to 'description'
            $table->renameColumn('szerző_id', 'author_id'); // Rename 'szerző_id' to 'author_id'
            $table->renameColumn('is_publikált', 'is_published'); // Rename 'is_publikált' to 'is_published'
            $table->renameColumn('dátum', 'date'); // Rename 'dátum' to 'date'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->renameColumn('title', 'cím');
            $table->renameColumn('description', 'leirás');
            $table->renameColumn('author_id', 'szerző_id');
            $table->renameColumn('is_published', 'is_publikált');
            $table->renameColumn('date', 'dátum');
        });
    }
};
