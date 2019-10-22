<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejar extends Model
{
    protected $table = 'kejars';

    protected $fillable = [
        'judul', 'desc', 'tgl_mulai', 'tgl_selesai'
    ];
}
