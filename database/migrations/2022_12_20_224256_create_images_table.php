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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            //
            //$table->string('path')->unique();
            $table->timestamps();
            //apartir de aqui es lo que se agrego
            $table->morphs('imageable');
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
};
