<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSetting extends Model
{
    use HasFactory;

    protected $table = 'tic_z_settings';

    protected $guarded = [];
    public $timestamps = false; 

    

    protected $fillable =
    [
        'client_id',
        'assign_acc_manager',
        'expiry',
        'pan',
        'talent_portal',
        'link',
        'ticket_type',
        'date',
        'time',
        'ip',
        'browser',
    ];
}
