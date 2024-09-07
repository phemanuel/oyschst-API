<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcceptanceFee;
use App\Models\StudentAdmission;

class StudentController extends Controller
{
    //
    public function index()
    {
        $allAcceptance = AcceptanceFee::all();

        if($allAcceptance){
            return response()->json([
            'data' => $allAcceptance,
        ]);
        } 
        else{
            return response()->json([
                'status' => 'No data available',
            ]);
        }
    }    

    public function getStudentsByAcceptance($admission_year)
    {
        // Calculate the next year
        $next_year = $admission_year + 1;

        // Create the academic session string
        $studentSession = "{$admission_year}/{$next_year}";        
        
        // Query the database for students with the academic session
        $students = AcceptanceFee::where('session1', $studentSession)->get();

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
    
    public function getStudentsByStudentNo($student_no)
    {        
        // Query the database for students with the student_no 
        $students = AcceptanceFee::where('matricno', $student_no)->get();

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
