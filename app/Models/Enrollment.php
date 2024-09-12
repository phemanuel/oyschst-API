<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'oyshia_enrollment';

    protected $fillable = [
        'id',
        'nin_no',
        'matric_no',
        'application_no',
        'surname',
        'first_name',
        'other_name',
        'sex',
        'state_of_origin',
        'department',
        'faculty',
        'level',
        'academic_session',
        'phone1',        
        'email1',
        'address1',        
        'lga',
        'title',
        'registered_date',
        'date_of_birth',
        'marital_status',
        'phone2',
        'email2',
        'address2',
        'city',
        'state',
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
        'enrollment_status',
    ];
}
