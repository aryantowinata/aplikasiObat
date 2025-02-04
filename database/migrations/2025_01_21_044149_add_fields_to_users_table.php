<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('jabatan')->nullable(); // Menambahkan kolom jabatan  
            $table->string('telepon')->nullable(); // Menambahkan kolom telepon  
            $table->string('nik')->nullable(); // Menambahkan kolom NIK  
            $table->string('foto_profile')->nullable(); // Menambahkan kolom foto profile  
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['jabatan', 'telepon', 'nik', 'foto_profile']); // Menghapus kolom saat rollback  
        });
    }
}
