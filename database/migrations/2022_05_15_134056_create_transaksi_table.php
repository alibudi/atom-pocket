<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
             $table->string('ID', 40)->primary();
            $table->string('kode', 11);
            $table->text('deskripsi', 100)->nullable();
            $table->date('tanggal');
            $table->string('nilai', 100);
            $table->string('dompet_ID', 40);
            $table->string('category_ID', 40);
            $table->string('status_ID', 40);

            $table->foreign('dompet_ID')
                ->references('ID')
                ->on('dompet')
                ->onUpdate('cascade');

            $table->foreign('category_ID')
                ->references('ID')
                ->on('category')
                ->onUpdate('cascade');

            $table->foreign('status_ID')
                ->references('ID')
                ->on('transaksi_status')
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
        Schema::dropIfExists('transaksi');
    }
}
