<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Windturbine extends Model
{
    protected $fillable = [
        'generalInfo', 'addressInfo',
    ];
}
