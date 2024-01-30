<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PraxController extends Controller
{
    public function savePrax(Request $request)
    {
        $newPrax = new Prax();
        $newPrax->nazov = $request->input('nazov', "nic");
        $newPrax->firma = $request->input('firma', "nic");
        $newPrax->adresa = $request->input('adresa', "nic");
        $newPrax->stav = $request->input('stav', "nic");
        $newPrax->hotnotenie = $request->input('hodnotenie', "nic");

        $newPrax->save();

        return response()->json([
            "prax_id" => $newPrax->id
        ]);
    }

    public function getPrax(int $id)
    {
        $prax = Prax::find($id);
        if($prax) {
            return response()->json($prax);
        } else {
            return response()->json("Nie je mozne najst prax.", 404);
        }
    }

    /*public function getStudentByEmail(string $email)
    {
        $student = Student::where('email', '=', $email)->first();

        if($student) {
            return response()->json($student);
        } else {
            return response()->json("Nie je mozne najst studenta.", 404);
        }
    }*/

    public function deletePrax(int $id)
    {
        $prax = Prax::find($id);

        if($prax) {
            $prax->delete();
            return response()->json("Prax odstranena.");
        } else {
            return response()->json("Nie je mozne najst prax.", 404);
        }
    }

    public function getAllPrax()
    {
        $prax = Prax::all();
        return response()->json($prax);
    }

    public function updatePrax(Request $request)
    {
        $id = $request->input('id', 0);

        $prax = Prax::findOrFail($id);

        $prax->nazov = $request->input('nazov');
        $prax->firma = $request->input('firma');
        $prax->adresa = $request->input('adresa');
        $prax->stav = $request->input('stav');
        $prax->hotnotenie = $request->input('hodnotenie');

        $prax->update();

        return response()->json($prax);
    }

    public function zmenStav(Request $request)
    {
        $id = $request->input('id', 0);
        $prax = Prax::findOrFail($id);
        $prax->stav = $request->input('stav');
    }

    public function zmenHodnotenie(Request $request)
    {
        $id = $request->input('id', 0);
        $prax = Prax::findOrFail($id);
        $prax->hotnotenie = $request->input('hodnotenie');
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
