<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'oyshia_enrollment';

    protected $fillable = [
        'nin_no',
        'matric_no',
        'application_no',
        'surname',
        'first_name',
        'other_name',
        'gender',
        'state',
        'department',
        'faculty',
        'level',
        'academic_session',
        'phone_no',        
        'email_addy',
        'address',        
        'lga',
        'title',
        'registered_date',
        'date_of_birth',
        'marital_status',
        'phone_no2',
        'email_address2',
        'address2',
        'city',
        'state1',
        'lga_oyo',
        'next_of_kin_fullname',
        'next_of_kin_phone',
        'next_of_kin_relationship',
        'next_of_kin_email',
        'next_of_kin_address1',
        'next_of_kin_address2',
        'next_of_kin_city',
        'next_of_kin_state',
        'next_of_kin_gender',
        'picture_url',
        'medical_condition',
    ];
}
