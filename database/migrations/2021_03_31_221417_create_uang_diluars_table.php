<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangDiluarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_diluars', function (Blueprint $table) {
            $table->bigincrements('id')->unsigned();
            $table->string('nama_konsumen')->nullable();
            $table->integer('hp_konsumen')->nullable();
            $table->integer('jumlah_tagihan')->nullable();
            $table->integer('jumlah_hutang')->nullable();
            $table->integer('sisa_hutang')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::drop('uang_diluars');
    }
}
