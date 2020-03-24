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
            $table->tinyInteger('achieved')->nullable();
            $table->unsignedInteger('teacher');
            $table->foreign('teacher')->references('id')->on('teachers');
            $table->unsignedInteger('coordinator');
            $table->foreign('coordinator')->references('id')->on('teachers');
            $table->integer('EC');
            $table->string('block')->nullable();
            $table->foreign('block')->references('name')->on('blocks');
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
