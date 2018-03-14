<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWindturbinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('windturbines', function (Blueprint $collection) {
            $collection->increments('id');

            $collection->string('userID');
            $collection->string('generalInfo');
            $collection->string('addressInfo');
            $collection->string('logs');

            $collection->index('generalInfo');

            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('windturbines');
    }
}
