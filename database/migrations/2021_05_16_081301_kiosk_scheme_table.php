<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KioskSchemeTable extends Migration
{
    public function up()
    {
        Schema::create('kiosk_scheme', function (Blueprint $table) {
            $table->id();
            $table->integer('scheme_id');
            $table->integer('kiosk_id');
        });
    }

    public function down()
    {
        //
    }
}
