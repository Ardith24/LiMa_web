<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sprint extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama_sprint', 'desc_sprint', 'tgl_mulai', 'tgl_selesai'];
}
