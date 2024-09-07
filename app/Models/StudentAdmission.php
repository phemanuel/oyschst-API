<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    use HasFactory;

    protected $table = 'application';

    protected $fillable = [
        'state',
        'lga',
        'dob',
        'mobileno',
        'address',
    ];
}
