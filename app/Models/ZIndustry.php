<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZIndustry extends Model
{
    use HasFactory;
    protected $table = 'z_industries';
    protected $guarded = [];
    public $timestamps = false; 
}
