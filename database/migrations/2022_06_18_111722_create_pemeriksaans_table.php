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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftaran');
            $table->string('id_tindakan');
            $table->string('id_obat');
            $table->string('hasil_pemeriksaan');
            $table->string('keterangan_pemeriksaan');
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
        Schema::dropIfExists('pemeriksaans');
    }
};
