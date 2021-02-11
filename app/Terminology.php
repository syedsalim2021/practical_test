<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminology extends Model
{
    protected $table = 'terminologies';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
}
