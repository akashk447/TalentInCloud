<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateApplicant extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_applicants';
    protected $primaryKey = "applicant_id";
    protected $guarded = [];
    public $timestamps = false; 
}
