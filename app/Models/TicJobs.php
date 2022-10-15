<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicJobs extends Model
{
    use HasFactory;
    protected $table = 'tic_company_jobs';
    protected $primaryKey = "job_id";
    protected $guarded = [];
    public $timestamps = false; 
}
