<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'tic_company';
    protected $primaryKey = "company_id";
    protected $guarded = [];
    public $timestamps = false; 
}
