<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrValueTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributeValues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('attr-groups-id');
            $table->foreign('attr-groups-id')->references('id')->on('attributegroups')->onDelete('cascade');
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
        Schema::dropIfExists('attributeValues');
    }
}
