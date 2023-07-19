<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longtitude')->nullable();
            $table->string('alamat')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('kerusakan', ['ringan', 'sedang', 'parah'])->nullable();
            $table->enum('status', ['Diajukan', 'Ditolak', 'DiTanggapi'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};
