<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicQuestionnaireQuestions extends Model
{
    use HasFactory;
    protected $table = 'tic_questionnaire_questions';
    protected $primaryKey = "question_id";
    protected $guarded = [];
    public $timestamps = false; 
}
