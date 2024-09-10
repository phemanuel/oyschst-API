<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'deptsetup';
    public $timestamps = false;
    
    protected $fillable = [ 
        'deptname',       
        'dept',      
    ];
}
