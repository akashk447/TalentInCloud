<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCloud extends Model
{
    use HasFactory;

    protected $table = 'tic_cloud';

    protected $guarded = [];
    public $timestamps = false; 
}
