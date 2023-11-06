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
        Schema::table('survey_respon', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sekolah')->after('id');
            $table->unsignedBigInteger('id_murid')->after('id_sekolah');
            $table->foreign('id_murid')->references('id')->on('murid')->onDelete('cascade');
            $table->foreign('id_sekolah')->references('id')->on('sekolah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('survey_respon', function (Blueprint $table) {
            //
        });
    }
};
