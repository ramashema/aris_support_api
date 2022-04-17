<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function all(){
        # TODO: Get all students from the database
        $students = Student::select('szRegistrationNumber', 'szFirstName', 'szMiddleName', 'szSurName')->get();

        if ($students){
            return response($students, 200);
        } else{
            return response([
                "error"=> "Resource not found",
            ], 404);
        }

    }

    public function show(Student $student){
        # TODO: Return the students requested by the registration number
        if ($student){
            return response($student, 200);
        } else{
            return response([
                'error' => 'Student not found'
            ], 404);
        }
    }

    public function reset_student_password(Student $student){
        # TODO: Reset the students passwor

        // take students surname
        if($student){
            $surname = strtoupper(str_replace("'","", stripslashes($student->szSurName)));
            $password = md5($surname);

            $student->szStPassword = $password;
            $student->datePasswordChanged = Carbon::now()->toDateTimeString();
            $student->save();

            // we can also check if the value has been updated

            return response([
                'success' => 'Password updated'
            ], 200);
        } else{
            return response([
                'error' => 'Student not found'
            ], 404);
        }
    }
}
