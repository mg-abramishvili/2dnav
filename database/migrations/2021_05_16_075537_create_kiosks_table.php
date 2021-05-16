<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiosksTable extends Migration
{
    public function up()
    {
        Schema::create('kiosks', function (Blueprint $table) {
            $table->id();
            $table->string('kiosk');
            $table->string('x');
            $table->string('y');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kiosks');
    }
}
