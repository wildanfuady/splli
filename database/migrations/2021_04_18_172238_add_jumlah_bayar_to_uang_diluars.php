<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJumlahBayarToUangDiluars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uang_diluars', function (Blueprint $table) {
            $table->biginteger('jumlah_tagihan2')->nullable()->after('jumlah_tagihan');
            $table->biginteger('jumlah_tagihan3')->nullable()->after('jumlah_tagihan2');
            $table->biginteger('jumlah_tagihan4')->nullable()->after('jumlah_tagihan3');
            $table->biginteger('jumlah_tagihan5')->nullable()->after('jumlah_tagihan4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uang_diluars', function (Blueprint $table) {
            //
        });
    }
}
