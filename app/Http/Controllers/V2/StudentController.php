<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcceptanceFee;
use App\Models\StudentAdmission;
use Illuminate\Support\Facades\DB; 
use App\Models\Enrollment;

class StudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('check.token');
    }  
        public function index()
    {
        $allAcceptance = DB::table('acceptance')
            ->join('application', 'acceptance.matricno', '=', 'application.applicationno')
            ->select(
                'acceptance.matricno',
                'acceptance.fullname',
                'application.programme as Gender' ,
                'application.emailaddy',
                'acceptance.course',
                'acceptance.level',
                'acceptance.state',
                'application.lga',
                'application.dob',
                'application.mobileno as mobileno',
                'application.address',                
                'acceptance.session1',
            )
            ->get();

        return response()->json([
            'data' => $allAcceptance,
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function getStudentsByAcceptance($admission_year)
    {
        // Calculate the next year
        $next_year = $admission_year + 1;

        // Create the academic session string
        $studentSession = "{$admission_year}/{$next_year}";

        // Select specific columns from Acceptance and Application tables
        $students = DB::table('acceptance')
            ->join('application', 'acceptance.matricno', '=', 'application.applicationno')
            ->where('acceptance.session1', $studentSession)
            ->select(
                'acceptance.matricno',
                'acceptance.fullname',
                'application.programme as Gender' ,
                'application.emailaddy',
                'acceptance.course',
                'acceptance.level',
                'acceptance.state',
                'application.lga',
                'application.dob',
                'application.mobileno as mobileno',
                'application.address',                
                'acceptance.session1',
            )
            ->get();

        // Return the result
        if ($students->isNotEmpty()) {
            return response()->json([
                'data' => $students,
            ], 200, [], JSON_UNESCAPED_SLASHES);
        } else {
            return response()->json([
                'status' => 'No data available',
            ]);
        }
    } 
    
    public function getStudentsByStudentNo($student_no)
    {        
        // Query the database for students with the student_no 
        $students = DB::table('acceptance')
            ->join('application', 'acceptance.matricno', '=', 'application.applicationno')
            ->where('acceptance.matricno', $student_no)
            ->select(
                'acceptance.matricno',
                'acceptance.fullname',
                'application.programme as Gender' ,
                'application.emailaddy',
                'acceptance.course',
                'acceptance.level',
                'acceptance.state',
                'application.lga',
                'application.dob',
                'application.mobileno as mobileno',
                'application.address',                
                'acceptance.session1',
            )
            ->get();

        // Return the result
        if ($students->isNotEmpty()) {
            return response()->json([
                'data' => $students,
            ]);
        } else {
            return response()->json([
                'status' => 'No data available',
            ]);
        }
    }  

    public function allEnrollees()
    {   
        // Retrieve enrollments where the specified fields are not empty and date of birth is not '1/1/1970'
        $enrollments = Enrollment::whereNotNull('nin_no')
            ->where('nin_no', '!=', '')
            ->whereNotNull('title')
            ->where('title', '!=', '')
            ->whereNotNull('marital_status')
            ->where('marital_status', '!=', '')
            ->whereNotNull('state_of_origin')
            ->where('state_of_origin', '!=', '')
            ->whereNotNull('phone1')
            ->where('phone1', '!=', '')
            ->whereNotNull('email1')
            // ->where('email1', '!=', '')
            // ->whereNotNull('address1')
            ->where('address1', '!=', '')
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->whereNotNull('date_of_birth')
            ->where('date_of_birth', '!=', '')
            ->where('date_of_birth', '!=', '1/1/1970')
            ->select(
                'id',
                'nin_no',
                'registered_date',
                'title',
                'surname',
                'first_name',
                'last_name',
                'sex',
                'date_of_birth',
                'marital_status',
                'state_of_origin',
                'phone1',
                'phone2',
                'email1',
                'email2',
                'address1',
                'address2',
                'city',
                'state',
                'lga_oyo',
                'next_of_kin_fullname',
                'next_of_kin_phone',
                'next_of_kin_relationship',
                'next_of_kin_email',
                'next_of_kin_address1',
                'next_of_kin_city',
                'next_of_kin_state',
                'next_of_kin_gender',
                'faculty',
                'department',
                'level',
                'matric_no',
                'application_no',
                'picture_url',
                'medical_condition',                 
                'academic_session'
            )
            ->orderBy('id', 'asc')
            ->paginate(10);

        // Return the result
        if ($enrollments->isNotEmpty()) {
            return response()->json([
                'data' => $enrollments,
            ]);

            // Encode the data in base64
            // $encodedData = base64_encode(json_encode($enrollments));

            // return response()->json([
            //     'encoded_data' => $encodedData,
            // ]);
        } else {
            return response()->json([
                'status' => 'No data available',
            ]);
        }

    }

    public function enrolleesById($id)
    {   
        // Retrieve enrollments where the specified fields are not empty and date of birth is not '1/1/1970'
        $enrollments = Enrollment::where('id', $id)
            ->whereNotNull('nin_no')
            ->where('nin_no', '!=', '')
            ->whereNotNull('title')
            ->where('title', '!=', '')
            ->whereNotNull('marital_status')
            ->where('marital_status', '!=', '')
            ->whereNotNull('state_of_origin')
            ->where('state_of_origin', '!=', '')
            ->whereNotNull('phone1')
            ->where('phone1', '!=', '')
            ->whereNotNull('email1')
            ->where('email1', '!=', '')
            // ->whereNotNull('address1')
            // ->where('address1', '!=', '')
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->whereNotNull('date_of_birth')
            ->where('date_of_birth', '!=', '')
            ->where('date_of_birth', '!=', '1/1/1970')
            ->select(
                'id',
                'nin_no',
                'registered_date',
                'title',
                'surname',
                'first_name',
                'last_name',
                'sex',
                'date_of_birth',
                'marital_status',
                'state_of_origin',
                'phone1',
                'phone2',
                'email1',
                'email2',
                'address1',
                'address2',
                'city',
                'state',
                'lga_oyo',
                'next_of_kin_fullname',
                'next_of_kin_phone',
                'next_of_kin_relationship',
                'next_of_kin_email',
                'next_of_kin_address1',
                'next_of_kin_city',
                'next_of_kin_state',
                'next_of_kin_gender',
                'faculty',
                'department',
                'level',
                'matric_no',
                'application_no',
                'picture_url',
                'medical_condition',                 
                'academic_session'
            )            
            ->get();

        // Return the result
        if ($enrollments->isNotEmpty()) {
            return response()->json([
                'data' => $enrollments,
            ]);
        } else {
            return response()->json([
                'status' => 'Enrollee cannot be found, or has not updated required information.',                
            ]);
        }

    }

    public function searchEnrollees(Request $request)
    {
        
        // Retrieve query parameters
        $surname = $request->query('surname');
        $lga = $request->query('lga');
        $sex = $request->query('sex');
        $state_of_origin = $request->query('state_of_origin');   

        return response()->json([
            'status' => 'success'
        ]);

        // //Start building the query
        // $query = Enrollment::query();

        // // Apply filters based on available parameters
        // if ($surname) {
        //     $query->where('surname', $surname);
        // }
        // if ($lga) {
        //     $query->where('lga_oyo', $lga);
        // }
        // if ($sex) {
        //     $query->where('sex', $sex);
        // }
        // if ($state_of_origin) {
        //     $query->where('state_of_origin', $state_of_origin);
        // }        

        // // Apply additional conditions
        // $query->whereNotNull('nin_no')
        // ->where('nin_no', '!=', '')
        // ->whereNotNull('title')
        // ->where('title', '!=', '')
        // ->whereNotNull('marital_status')
        // ->where('marital_status', '!=', '')
        // ->whereNotNull('state_of_origin')
        // ->where('state_of_origin', '!=', '')
        // ->whereNotNull('phone1')
        // ->where('phone1', '!=', '')
        // ->whereNotNull('email1')
        // ->where('email1', '!=', '')
        // ->whereNotNull('state')
        // ->where('state', '!=', '')
        // ->whereNotNull('date_of_birth')
        // ->where('date_of_birth', '!=', '')
        // ->where('date_of_birth', '!=', '1/1/1970');

        // // Select specific columns
        // $enrollments = $query->select(
        //     'id',
        //     'nin_no',
        //     'registered_date',
        //     'title',
        //     'surname',
        //     'first_name',
        //     'last_name',
        //     'sex',
        //     'date_of_birth',
        //     'marital_status',
        //     'state_of_origin',
        //     'phone1',
        //     'phone2',
        //     'email1',
        //     'email2',
        //     'address1',
        //     'address2',
        //     'city',
        //     'state',
        //     'lga_oyo',
        //     'next_of_kin_fullname',
        //     'next_of_kin_phone',
        //     'next_of_kin_relationship',
        //     'next_of_kin_email',
        //     'next_of_kin_address1',
        //     'next_of_kin_city',
        //     'next_of_kin_state',
        //     'next_of_kin_gender',
        //     'faculty',
        //     'department',
        //     'level',
        //     'matric_no',
        //     'application_no',
        //     'picture_url',
        //     'medical_condition',
        //     'academic_session'
        // )
        // ->orderBy('id', 'asc')
        // ->paginate(20); // Paginate results

        // // Return the result
        // return response()->json([
        //     'data' => $enrollments,
        // ]);
     }

    //  public function generateToken(Request $request)
    // {
    //     $user = $request->user(); // Assuming the user is authenticated

    //     // Generate a new token
    //     $token = $user->createToken('OYSCHST-API')->plainTextToken;

    //     return response()->json([
    //         'token' => $token,
    //     ]);
    // }
    
}
