<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicScorecard extends Model
{
    use HasFactory;
    protected $table = 'tic_job_scorecard';
    protected $primaryKey = "scorecard_id";
    protected $guarded = [];
    public $timestamps = false; 
}
