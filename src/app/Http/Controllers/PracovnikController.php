<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracovnikController extends Controller
{
    public function savePracovnik(Request $request)
    {
        $newPracovnik = new Pracovnik();
        $newPracovnik->email = $request->input('email', "nic");
        $newPracovnik->meno = $request->input('meno', "nic");
        $newPracovnik->priezvisko = $request->input('priezvisko', "nic");
        $newPracovnik->pozicia = $request->input('pozicia', "nic");

        $newPracovnik->save();

        return response()->json([
            "pracovnik_id" => $newPracovnik->id
        ]);
    }

    public function getPracovnik(int $id)
    {
        $pracovnik = Pracovnik::find($id);
        if($pracovnik) {
            return response()->json($pracovnik);
        } else {
            return response()->json("Nie je mozne najst pracovnika.", 404);
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

    public function deletePracovnik(int $id)
    {
        $pracovnik = Pracovnik::find($id);

        if($pracovnik) {
            $pracovnik->delete();
            return response()->json("Pracovnik odstraneny.");
        } else {
            return response()->json("Nie je mozne najst pracovnika.", 404);
        }
    }

    public function getAllPracovnik()
    {
        $pracovnici = Pracovnik::all();
        return response()->json($pracovnici);
    }

    public function updatePracovnik(Request $request)
    {
        $id = $request->input('id', 0);

        $pracovnik = Pracovnik::findOrFail($id);

        $pracovnik->email = $request->input('email');
        $pracovnik->meno = $request->input('meno');
        $pracovnik->priezvisko = $request->input('priezvisko');
        $pracovnik->pozicia = $request->input('pozicia');

        $pracovnik->update();

        return response()->json($pracovnik);
    }

}
