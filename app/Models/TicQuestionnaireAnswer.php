<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicQuestionnaireAnswer extends Model
{
    use HasFactory;
    protected $table = 'tic_questionnaire_answer';
    protected $primaryKey = "answer_id";
    protected $guarded = [];
    public $timestamps = false; 
}
