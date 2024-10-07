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
        Schema::create('tjawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('tsurvey');
            
            $table->unsignedBigInteger('pertanyaan_id');
            $table->foreign('pertanyaan_id')->references('id')->on('tpertanyaan');
            
            $table->string('jawaban');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tjawaban');
    }
};
