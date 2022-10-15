<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZLocation extends Model
{
    use HasFactory;
    protected $table = 'z_locations';
    protected $guarded = [];
    public $timestamps = false;
}
