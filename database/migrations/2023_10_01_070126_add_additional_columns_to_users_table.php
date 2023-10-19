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
        Schema::table('users', function (Blueprint $table) {
            $table->date('tanggal_lahir')->default('1992-03-19');
            $table->string('pekerjaan')->nullable();
            $table->string('kota')->nullable();
            $table->text('bio_profil')->nullable();
            $table->string('gambar_profil')->default('default_profile.jpg');
            $table->tinyInteger('background_profil')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('pekerjaan');
            $table->dropColumn('kota');
            $table->dropColumn('bio_profil');
            $table->dropColumn('gambar_profil');
            $table->dropColumn('background_profil');
        });
    }
};
