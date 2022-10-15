<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicScorecardSet extends Model
{
    use HasFactory;
    protected $table = 'tic_scorecard_set';
    protected $primaryKey = "scorecard_set_id";
    protected $guarded = [];
    public $timestamps = false; 
}
