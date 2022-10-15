<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateCallSummary extends Model
{
    use HasFactory;
    protected $table = 'tic_candidate_call_summary';
    protected $primaryKey = "r_summary_id";
    protected $guarded = [];
    public $timestamps = false; 
}
