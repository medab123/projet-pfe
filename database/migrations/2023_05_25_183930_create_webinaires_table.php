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
        Schema::create('webinaires', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("image");
            $table->text("description");
            $table->dateTime("start_dt");
            $table->dateTime("end_dt");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinaires');
    }
};