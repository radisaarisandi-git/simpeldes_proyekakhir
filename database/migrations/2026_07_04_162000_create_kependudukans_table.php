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
        // Bagian ini yang ada di gambar kamu (image_256e6e.png)
        Schema::create('kependudukans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Kolom foreign key
            $table->string('nik', 16)->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rt_rw'); // Pastikan rt_rw, bukan re_rw
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('status_perkawinan');
            $table->timestamps();

            // RELASI YANG BENAR SESUAI STRUKTURMU:
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kependudukans');
    }
};