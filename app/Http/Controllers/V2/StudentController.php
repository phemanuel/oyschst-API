<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcceptanceFee;
use App\Models\StudentAdmission;
use Illuminate\Support\Facades\DB; 

class StudentController extends Controller
{
    //
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
    
}
