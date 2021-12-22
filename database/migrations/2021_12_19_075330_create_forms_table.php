<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nisn')->unique();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('nama_ortu_wali');
            $table->string('pekerjaan_ortu_wali');
            $table->string('alamat');
            $table->string('kp');
            $table->string('rt');
            $table->string('rw');
            $table->string('kecamatan');
            $table->string('kab_kota');
            $table->string('no_telp');
            $table->string('asal_sekolah');
            $table->string('nilai_mtk');
            $table->string('nilai_indo');
            $table->string('nilai_ing');
            $table->string('nilai_ipa');
            $table->string('ijazah_skhun');
            $table->string('akta');
            $table->string('kk');
            $table->string('jurusan');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('forms');
    }
}
