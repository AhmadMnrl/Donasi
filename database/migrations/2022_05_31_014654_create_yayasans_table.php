<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYayasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yayasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_tlp');
            $table->string('email');
            $table->text('address');
            $table->string('foto')->nullable();
            $table->longText('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations..
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yayasan');
    }
}
