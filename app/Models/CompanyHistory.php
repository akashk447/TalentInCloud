<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyHistory extends Model
{
    use HasFactory;

    protected $table = 'tic_company_history';

    protected $primaryKey = 'company_history_id';

    protected $guarded = [];

    public $timestamps = false; 
}
