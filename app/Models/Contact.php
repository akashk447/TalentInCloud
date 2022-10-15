<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'tic_company_contacts';

    protected $primaryKey = 'contact_id';

    protected $guarded = [];

    public $timestamps = false; 
}
