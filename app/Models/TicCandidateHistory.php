<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateHistory extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_history';
    protected $primaryKey = "candidate_history_id";
    protected $guarded = [];
    public $timestamps = false; 
}
