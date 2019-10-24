<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['sprint_id', 'nama_task', 'kesulitan_id', 'status'];

}
