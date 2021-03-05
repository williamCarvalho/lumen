<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    protected $table = 'drone';
    public $incrementing = false;
    protected $guarded = [];
}