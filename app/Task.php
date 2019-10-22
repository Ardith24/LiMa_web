<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    
    protected $fillable = ['sprint_id', 'nama_task', 'kesulitan_id', 'status'];
}

// $table->increments('id');
// $table->integer('sprint_id')->unsigned();
// $table->string('nama_task');
// $table->integer('kesulitan_id')->unsigned();
// $table->timestamps();

// $table->foreign('sprint_id')->references('id')->on('sprints');
// $table->foreign('kesulitan_id')->references('id')->on('kesulitans');
