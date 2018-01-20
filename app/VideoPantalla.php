<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoPantalla extends Model
{
    protected $table = 'video_pantallas';

    protected $fillable = ['pantalla','video'];
}
