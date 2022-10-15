<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table = 'z_jd_category';
    protected $primaryKey = "jd_category_id";
    protected $guarded = [];
    public $timestamps = false; 
}
