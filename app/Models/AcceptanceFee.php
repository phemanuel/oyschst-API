<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptanceFee extends Model
{
    use HasFactory;

    protected $table = 'acceptance';
    public $timestamps = false;
    
    protected $fillable = [
        'state',
        'gender',
        'fullname',
        'matricno',
        'emailaddy',
        'mobileno',
        'amounttopay',
        'amountpaid',
        'balance',
        'course',
        'level',
        'feetype',
        'bankname',
        'tellerno',
        'session1',
        'paymentdate',
        'date1',
        'confirmby',
        'transno',
        'paymode'
    ];
}
