<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    use HasFactory;

    protected $table = 'application';

    protected $fillable = [
        'applicationno',
        'courseselect1',
        'surname',
        'firstname',
        'othername',
        'emailaddy',
        'programme',
        'academiclevel',
        'state',
        'lga',
        'dob',
        'mobileno',
        'address',
    ];
}
