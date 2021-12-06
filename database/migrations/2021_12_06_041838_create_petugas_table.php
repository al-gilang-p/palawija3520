<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->char('kd_pcl', 3)->unique();
            $table->string('username')->unique();
            $table->string('password')->default(password_hash('123456', PASSWORD_DEFAULT));
            $table->timestamps();

            $table->foreign('kd_pcl')->references('kd_pcl')->on('wilayahs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}