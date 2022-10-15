<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateSnooze extends Model
{
    use HasFactory;
    protected $table = 'tic_candidate_snooze';
    protected $primaryKey = "snooze_id";
    protected $guarded = [];
    public $timestamps = false; 
}
