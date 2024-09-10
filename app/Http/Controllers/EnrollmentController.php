<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\StudentAdmission;
use App\Models\Faculty;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function enrollment($id = null)
    {
        if (empty($id)) {            
            return view('student-not-found');
        }

        return redirect()->route('enrollment-view', ['id' => $id]);
    }

    public function enrollmentView($id = null)
    {
        if (empty($id)) {            
            return view('student-not-found');
        }

        $checkEnrollment = Enrollment::where('application_no', $id)->first();        

        if (!$checkEnrollment){
            $studentData = StudentAdmission::where('applicationno', $id)->first();

            $department = $studentData->courseselect1;
            $getFaculty = Faculty::where('deptname', '=', $department)->first();
            $faculty = $getFaculty->dept;

            return view('enrollment-step1', compact('studentData','faculty'));
        }
            $department = $checkEnrollment->department;
            $getFaculty = Faculty::where('deptname', '=', $department)->first();
            $faculty = $getFaculty->dept;
            return view('enrollment-step1-update', compact('checkEnrollment','faculty'));
    }

    public function enrollmentStep1Save(Request $request)
    {
        // Validate the request input
        $request->validate([
            'title' => 'required|string|max:255',
            'nin_no' => 'required|digits:11|unique:oyshia_enrollment,nin_no',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'other_name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required|string|max:10',
            'email_addy' => 'required|email|unique:oyshia_enrollment,email_addy',
            'phone_no' => 'required|string|max:15',
            'marital_status' => 'required|string|max:20',
            'address' => 'required|string',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state1' => 'required|string|max:255',
            'lga_oyo' => 'required|string|max:255',
            'department' => 'required|string',
            'faculty' => 'required|string',
            'application_no' => 'required|string',
            'level' => 'required|string',
            'academic_session' => 'required|string',
            'lga' => 'required|string',
        ]);

        $applicationNo = $request->input('application_no');
        // Construct the picture URL
        $pictureUrl = 'https://www.oyschst.edu.ng/epayment/registration/uploads/' . $applicationNo . '.jpg';
        // Check if the enrollment record exists
        $checkEnrollment = Enrollment::where('application_no', $applicationNo)->first();

        if ($checkEnrollment) {
            // Redirect if record already exists
            return redirect()->route('enrollment')->with('message', 'Enrollment already exists.');
        }

        // Create a new enrollment record
        $newEnrollment = Enrollment::create([
            'title' => $request->input('title'),
            'nin_no' => $request->input('nin_no'),
            'surname' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'other_name' => $request->input('other_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'email_addy' => $request->input('email_addy'),
            'phone_no' => $request->input('phone_no'),
            'marital_status' => $request->input('marital_status'),
            'address' => $request->input('address'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'state1' => $request->input('state1'),
            'lga_oyo' => $request->input('lga_oyo'),
            'department' => $request->input('department'),
            'faculty' => $request->input('faculty'),
            'application_no' => $request->input('application_no'),
            'level' => $request->input('level'),
            'academic_session' => $request->input('academic_session'),
            'lga' => $request->input('lga'),
            'picture_url' => $pictureUrl,
        ]);

        // Redirect back with the newly created record's details
        return view('enrollment-step2', ['checkEnrollment' => $newEnrollment]);
    }

    public function enrollmentStep2Save(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'next_of_kin_fullname' => 'required|string|max:255',
            'next_of_kin_relationship' => 'required|string|max:50',
            'next_of_kin_email' => 'required|email|max:255',
            'next_of_kin_phone' => 'required|string|max:15',
            'next_of_kin_state' => 'required|string|max:50',
            'next_of_kin_city' => 'required|string|max:100',
            'next_of_kin_address1' => 'required|string|max:500',
            'next_of_kin_gender' => 'required|string|max:10',
        ]);

        // Find the Enrollment by ID
        $checkEnrollment = Enrollment::findOrFail($id);

        if (!$checkEnrollment) {
            return redirect()->route('student-not-found');
        }

        // Update the Enrollment data with next of kin details
        $checkEnrollment->update([
            'next_of_kin_fullname' => $validatedData['next_of_kin_fullname'],
            'next_of_kin_relationship' => $validatedData['next_of_kin_relationship'],
            'next_of_kin_email' => $validatedData['next_of_kin_email'],
            'next_of_kin_phone' => $validatedData['next_of_kin_phone'],
            'next_of_kin_state' => $validatedData['next_of_kin_state'],
            'next_of_kin_city' => $validatedData['next_of_kin_city'],
            'next_of_kin_address1' => $validatedData['next_of_kin_address1'],
            'next_of_kin_gender' => $validatedData['next_of_kin_gender'],
        ]);

        // Redirect back with a success message
        return redirect()->route('enrollment-preview', ['id' => $id])->with('success', 'Enrollement details updated successfully.');
    }


    public function enrollmentStep1Update(Request $request, $id)
    {
        // Validate the request input
        $request->validate([
            'title' => 'required|string|max:255',
            'nin_no' => 'required|digits:11|unique:oyshia_enrollment,nin_no,' . $id,
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required|string|max:10',
            'email_addy' => 'required|email|unique:oyshia_enrollment,email_addy,' . $id,
            'phone_no' => 'required|string|max:15',
            'marital_status' => 'required|string|max:20',
            'address' => 'required|string',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state1' => 'required|string|max:255',
            'lga_oyo' => 'required|string|max:255',
            'department' => 'required|string',
            'faculty' => 'required|string',
        ]);        

        // Find the enrollment record by ID
        $checkEnrollment = Enrollment::findOrFail($id);
        $applicationNo = $checkEnrollment->application_no;
        // Construct the picture URL
        $pictureUrl = 'https://www.oyschst.edu.ng/epayment/registration/uploads/' . $applicationNo . '.jpg';
        // Update the enrollment record
        $checkEnrollment->update([
            'title' => $request->input('title'),
            'nin_no' => $request->input('nin_no'),
            'surname' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'email_addy' => $request->input('email_addy'),
            'phone_no' => $request->input('phone_no'),
            'marital_status' => $request->input('marital_status'),
            'address' => $request->input('address'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'state1' => $request->input('state1'),
            'lga_oyo' => $request->input('lga_oyo'),
            'department' => $request->input('department'),
            'faculty' => $request->input('faculty'),
            'picture_url' => $pictureUrl,
        ]);

        // Redirect back with a success message
        return view('enrollment-step2-update',  compact('checkEnrollment') );
    }

    public function enrollmentStep2Update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'next_of_kin_fullname' => 'required|string|max:255',
            'next_of_kin_relationship' => 'required|string|max:50',
            'next_of_kin_email' => 'required|email|max:255',
            'next_of_kin_phone' => 'required|string|max:15',
            'next_of_kin_state' => 'required|string|max:50',
            'next_of_kin_city' => 'required|string|max:100',
            'next_of_kin_address1' => 'required|string|max:500',
            'next_of_kin_gender' => 'required|string|max:10',
        ]);

        // Find the Enrollment by ID
        $checkEnrollment = Enrollment::findOrFail($id);

        if (!$checkEnrollment) {
            return redirect()->route('student-not-found');
        }

        // Update the Enrollment data with next of kin details
        $checkEnrollment->update([
            'next_of_kin_fullname' => $validatedData['next_of_kin_fullname'],
            'next_of_kin_relationship' => $validatedData['next_of_kin_relationship'],
            'next_of_kin_email' => $validatedData['next_of_kin_email'],
            'next_of_kin_phone' => $validatedData['next_of_kin_phone'],
            'next_of_kin_state' => $validatedData['next_of_kin_state'],
            'next_of_kin_city' => $validatedData['next_of_kin_city'],
            'next_of_kin_address1' => $validatedData['next_of_kin_address1'],
            'next_of_kin_gender' => $validatedData['next_of_kin_gender'],
        ]);

        // Redirect back with a success message
        return redirect()->route('enrollment-preview', ['id' => $id])->with('success', 'Enrollement details updated successfully.');
    }

    public function showEnrollmentPreview($id)
    {
        // Find the Enrollment by ID
        $checkEnrollment = Enrollment::find($id);

        if (!$checkEnrollment) {
            return redirect()->route('student-not-found');
        }

        // Pass the Enrollment data to the view
        return view('enrollment-preview', compact('checkEnrollment'));
    }

}
