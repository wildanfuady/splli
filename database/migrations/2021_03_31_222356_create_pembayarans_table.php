<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigincrements('id')->unsigned();
            $table->string('id_po')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->string('plat_motor')->nullable();
            $table->string('nama_konsumen')->nullable();
            $table->string('nama_sparepart')->nullable();
            $table->integer('harga_grosir')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('harga_pasang')->nullable();
            $table->integer('jasa_service')->nullable();
            $table->integer('total_harga')->nullable();
            $table->integer('selisih')->nullable();
            $table->biginteger('created_by')->unsigned()->nullable();
            $table->biginteger('updated_by')->unsigned()->nullable();
            $table->biginteger('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('pembayarans');
    }
}
