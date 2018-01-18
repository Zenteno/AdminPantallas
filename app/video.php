<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'id',
        'vi_nombreViejo',
        'vi_nombreNuevo',
        'us_id',
    ];
    //padre
    public function User()
    {
        return $this->belongsTo('App\User', 'us_id', 'id');
    }
}
