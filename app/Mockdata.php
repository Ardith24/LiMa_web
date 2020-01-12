<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mockdata extends Model
{
    protected $table = 'sprints';

    protected $fillable = ['nama_sprint', 'desc_sprint', 'tgl_mulai', 'tgl_selesai'];
}
