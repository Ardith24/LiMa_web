<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sprint_id')->unsigned();
            $table->string('nama_task');
            $table->integer('kesulitan_id')->unsigned();
            $table->enum('status',['0','1']);
            $table->timestamps();
            
            $table->foreign('sprint_id')->references('id')->on('sprints');
            $table->foreign('kesulitan_id')->references('id')->on('kesulitans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
