<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pantalla extends Model
{
    protected $table = 'pantallas';

    protected $fillable = ['usuario'];
}
