<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicInterview extends Model
{
    use HasFactory;
    protected $table = 'tic_interviews';
    protected $primaryKey = "interview_id";
    protected $guarded = [];
    public $timestamps = false; 
}
