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
        Schema::create('obat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat_masuk')->unique();;
            $table->string('kode_obat');
            $table->string('nama_obat');
            $table->string('satuan');
            $table->integer('jumlah');
            $table->date('tanggal_obat_masuk');
            $table->date('tanggal_kadaluarsa');
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
        Schema::dropIfExists('obat_masuks');
    }
};
