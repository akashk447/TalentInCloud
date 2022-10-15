<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicQuestionnaireQuestionSet extends Model
{
    use HasFactory;
    protected $table = 'tic_questionnaire_question_set';
    protected $primaryKey = "question_set_id";
    protected $guarded = [];
    public $timestamps = false; 
}
