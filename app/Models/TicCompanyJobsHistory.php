<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCompanyJobsHistory extends Model
{
    use HasFactory;
    protected $table = 'tic_company_jobs_history';
    protected $primaryKey = "job_history_id";
    protected $guarded = [];
    public $timestamps = false; 
}
