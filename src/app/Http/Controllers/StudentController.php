<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function saveStudent(Request $request)
    {
        $newStudent = new Studnet();
        $newStudent->email = $request->input('email', "nic");
        $newStudent->first_name = $request->input('first_name', "nic");
        $newStudent->last_name = $request->input('last_name', "nic");
        $newStudent->age = $request->input('age', 0);

        $newStudent->save();

        return response()->json([
            "student_id" => $newStudent->id
        ]);
    }

    public function getStudent(int $id)
    {
        $student = User::find($id);
        if($student) {
            return response()->json($student);
        } else {
            return response()->json("Nie je mozne najst studenta.", 404);
        }
    }

    public function getStudentByEmail(string $email)
    {
        $student = Student::where('email', '=', $email)->first();

        if($student) {
            return response()->json($student);
        } else {
            return response()->json("Nie je mozne najst studenta.", 404);
        }
    }

    public function deleteStudent(int $id)
    {
        $student = Studnet::find($id);

        if($student) {
            $student->delete();
            return response()->json("Student odstraneny.");
        } else {
            return response()->json("Nie je mozne najst studenta.", 404);
        }
    }

    public function getAllStudents()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function updateStudent(Request $request)
    {
        $id = $request->input('id', 0);

        $student = Student::findOrFail($id);

        $student->email = $request->input('email');
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->age = $request->input('age');

        $student->update();

        return response()->json($student);
    }

    public function getAllUserContacts(int $id)
    {
        DB::connection()->enableQueryLog();
        $user = User::query()->find($id);
        if($user) {
            /** @var Collection $contacts */
            $contacts = $user->contacts;
            $queries = DB::getQueryLog();
            return response()->json($contacts);
        } else {
            return response()->json('User not found', 404);
        }
    }
}
