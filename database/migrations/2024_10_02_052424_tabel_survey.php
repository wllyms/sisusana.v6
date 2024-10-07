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
        Schema::create('tsurvey', function (Blueprint $table) {
            $table->id();
            $table->string('usia');
            $table->string('jpasien');
            $table->string('jkelamin');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('jlayanan');
            $table->string('kritik');
            $table->string('tanggal');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsurvey');
    }
};
