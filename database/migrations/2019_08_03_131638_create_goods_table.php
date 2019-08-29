<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('consignment_id');
            $table->string('p1t3');
            $table->unsignedBigInteger('p2t3');
            $table->string('p3t3');
            $table->float('p4t3', 12, 3);
            $table->float('p5t3', 10, 3);
            $table->float('p6t3', 12, 3);
            $table->string('p7t3');
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
        Schema::dropIfExists('goods');
    }
}
