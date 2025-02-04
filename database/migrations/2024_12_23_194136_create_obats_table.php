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
        Schema::create('obats', function (Blueprint $table) {
            $table->id('id_obat'); // Primary key
            $table->string('kode_obat')->unique(); // Unique kode obat, diisi otomatis
            $table->string('nama_obat', 255);
            $table->string('satuan', 50);
            $table->integer('jumlah');
            $table->date('tanggal_kadaluarsa');
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
};
