<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAgreement extends Model
{
    use HasFactory;

    protected $table = 'tic_company_agreements';

    protected $primaryKey = 'company_agreements_id';

    protected $guarded = [];

    public $timestamps = false; 
}
