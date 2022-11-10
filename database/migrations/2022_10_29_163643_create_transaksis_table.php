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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id');
            $table->string('transaksi_id');
            $table->integer('biaya');
            $table->string('tipe_pembayaran');
            $table->datetime('waktu_transaksi');
            $table->string('status_transaksi');
            $table->string('bank')->nullable();
            $table->string('nomor_va')->nullable();
            $table->string('status_fraud')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->datetime('batas_pembayaran')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
};
