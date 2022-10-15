<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateSourceSummary extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_source_summary';
    protected $primaryKey = "summary_id";
    protected $guarded = [];
    public $timestamps = false; 
}
