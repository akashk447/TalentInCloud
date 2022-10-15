<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateEducationDetials extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_education_details';
    protected $primaryKey = "candidate_education_id";
    protected $guarded = [];
    public $timestamps = false; 
}
