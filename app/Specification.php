<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $table = 'specification';
    protected $fillable = [
        'terminology_id',
        'car_name',
        'model',
        'price',
        'color',
        'milage',
        'photo',
        'created_at',
        'updated_at'
    ];
}
