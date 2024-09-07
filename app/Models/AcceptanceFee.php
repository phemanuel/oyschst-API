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
        'matricno',       
        'fullname',        
        'gender',
        'emailaddy',
        'mobileno',        
        'course',
        'level',  
        'state',              
        'session1',        
    ];

    protected $hidden = [
       'amounttopay',
        'amountpaid',
        'balance',
        'feetype',
        'bankname',
        'tellerno',
        'paymentdate',
        'date1',
        'confirmby',
        'transno',
        'paymode',
    ];
    
}
