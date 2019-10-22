<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesulitan extends Model
{
    protected $fillable = ['nama_tingkat', 'bobot'];
}
