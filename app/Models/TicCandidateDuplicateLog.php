<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateDuplicateLog extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_duplicate_log_history';
    protected $primaryKey = "duplicate_id";
    protected $guarded = [];
    public $timestamps = false; 
}
