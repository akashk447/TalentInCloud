<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobContent extends Model
{
    use HasFactory;
    protected $table = 'z_jd_content';
    protected $primaryKey = "sbc_id";
    protected $guarded = [];
    public $timestamps = false; 
}
