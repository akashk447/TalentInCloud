<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateExperienceDetails extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_experience_details';
    protected $primaryKey = "candidate_experience_id";
    protected $guarded = [];
    public $timestamps = false; 
}
