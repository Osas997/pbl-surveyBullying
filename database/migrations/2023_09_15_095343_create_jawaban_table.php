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
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanyaan')->index();
            $table->unsignedBigInteger('id_survey_respon')->index();
            $table->foreign('id_pertanyaan')->references('id')->on('pertanyaan')->onDelete('cascade');
            $table->foreign('id_survey_respon')->references('id')->on('survey_respon')->onDelete('cascade');
            $table->string('skor', 10)->nullable(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban');
    }
};
