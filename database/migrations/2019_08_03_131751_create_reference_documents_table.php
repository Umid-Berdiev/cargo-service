<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('consignment_id');
            $table->string('p1t4');
            $table->string('p2t4', 100);
            $table->date('p3t4');
            $table->string('p4t4', 54);
            $table->longText('p5t4')->nullable();
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
        Schema::dropIfExists('reference_documents');
    }
}
