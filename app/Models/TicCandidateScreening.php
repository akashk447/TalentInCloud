<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicCandidateScreening extends Model
{
    use HasFactory;
    protected $table = 'tic_candidates_screening';
    protected $primaryKey = "screen_id";
    protected $guarded = [];
    public $timestamps = false; 
}
