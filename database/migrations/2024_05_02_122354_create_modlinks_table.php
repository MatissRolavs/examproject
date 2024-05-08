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
        Schema::create('modlinks', function (Blueprint $table) {
            $table->id();
            $table->string("modlink");
            $table->string("moddesc");
            $table->integer("user_id");
            $table->integer("list_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modlinks');
    }
};
