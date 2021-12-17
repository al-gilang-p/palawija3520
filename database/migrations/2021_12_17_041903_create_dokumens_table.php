<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->integer('jum_petak');
            $table->integer('pjgsisi_bt');
            $table->integer('pjgsisi_us');
            $table->enum('rand_hal', ['1', '2']);
            $table->integer('rand_bar');
            $table->integer('rand_kol');
            $table->integer('randterpilih_bt');
            $table->integer('randterpilih_us');
            $table->date('tgl_ubin');
            $table->enum('jenis_lahan', ['1', '2', '3', '4', '5']);
            $table->bigInteger('luas_ubin');
            $table->integer('benih');
            $table->float('pupuk_urea');
            $table->float('pupuk_tsp');
            $table->float('pupuk_kcl');
            $table->float('pupuk_npk');
            $table->float('pupuk_padat');
            $table->float('pupuk_cair');
            $table->float('pupuk_za');
            $table->float('berat_ubin');
            $table->integer('rumpun');
            $table->enum('opt_thnini', ['1', '2', '3']);
            $table->enum('alas_perontokan', ['1', '2', '3', '4', '5']);
            $table->foreignId('wilayah_id')->constrained('wilayahs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dokumens');
    }
}
