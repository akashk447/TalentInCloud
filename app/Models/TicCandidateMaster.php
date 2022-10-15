<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateMaster extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_master';
    protected $primaryKey = "candidate_id";
    protected $guarded = [];
    public $timestamps = false; 
}
