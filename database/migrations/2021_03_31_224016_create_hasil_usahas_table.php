<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilUsahasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_usahas', function (Blueprint $table) {
            $table->bigincrements('id')->unsigned();
            $table->biginteger('pembayaran_id')->unsigned()->nullable();
            $table->biginteger('uang_keluar_id')->unsigned()->nullable();
            $table->string('tanggal')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('total_saldo')->nullable();
            $table->biginteger('created_by')->unsigned()->nullable();
            $table->biginteger('updated_by')->unsigned()->nullable();
            $table->biginteger('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans');
            $table->foreign('uang_keluar_id')->references('id')->on('uang_keluars');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hasil_usahas');
    }
}
