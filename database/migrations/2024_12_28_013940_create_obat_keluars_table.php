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
        Schema::create('obat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat_keluar')->unique();
            $table->string('kode_obat');
            $table->string('nama_obat');
            $table->string('satuan');
            $table->integer('jumlah');
            $table->date('tanggal_distribusi');
            $table->date('tanggal_kadaluarsa');
            $table->string('tujuan');

            // Menambahkan relasi ke tabel tempat
            $table->foreignId('id_tempat')
                ->constrained('tempats') // Nama tabel tempat
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('obat_keluars');
    }
};
