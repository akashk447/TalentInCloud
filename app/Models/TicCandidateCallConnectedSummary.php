<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateCallConnectedSummary extends Model
{
    use HasFactory;
    protected $table = 'tic_candidate_call_connected_summary';
    protected $primaryKey = "connect_id";
    protected $guarded = [];
    public $timestamps = false; 
}
