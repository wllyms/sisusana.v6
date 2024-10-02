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
        Schema::create('tpertanyaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grup_id');
            $table->foreign('grup_id')->references('id')->on('tgrup');
            $table->string('pertanyaan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
