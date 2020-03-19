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
            $table->id();
            $table->string('name', 50)->unique();
            $table->tinyInteger('achieved');
            $table->unsignedInteger('teacher');
            $table->foreign('teacher')->references('id')->on('teachers');
            $table->unsignedInteger('coordinator');
            $table->foreign('coordinator')->references('id')->on('teachers');
            $table->integer('EC');
            $table->string('block');
            $table->foreign('block')->references('id')->on('blocks');
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
