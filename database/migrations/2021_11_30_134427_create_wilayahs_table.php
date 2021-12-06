<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayahs', function (Blueprint $table) {
            $table->id();
            $table->enum('sr', ['1', '2', '3']);
            $table->char('kd_kec', 3);
            $table->string('nm_kec', 100);
            $table->char('kd_desa', 3);
            $table->string('nm_desa', 100);
            $table->char('nbs', 4);
            $table->char('nks', 8);
            $table->char('id_segmen', 9);
            $table->string('nm_lokasi', 100);
            $table->float('ar');
            $table->char('subsegmen', 2);
            $table->char('bln_panen', 2);
            $table->char('kd_pcl', 3)->unique();
            $table->string('nm_pcl', 100);
            $table->char('kd_pml', 3);
            $table->string('nm_pml', 100);
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
        Schema::dropIfExists('wilayahs');
    }
}