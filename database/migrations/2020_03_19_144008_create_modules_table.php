<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->tinyInteger('achieved');
            $table->unsignedInteger('teacher');
            $table->foreign('teacher')->references('id')->on('teachers');
            $table->unsignedInteger('coordinator');
            $table->foreign('coordinator')->references('id')->on('teachers');
            $table->integer('EC');
            $table->unsignedInteger('block_id');
            $table->foreign('block_id')->references('id')->on('blocks');
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
        Schema::dropIfExists('modules');
    }
}
