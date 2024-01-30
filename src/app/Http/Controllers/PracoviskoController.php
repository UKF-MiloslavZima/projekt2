<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracoviskoController extends Controller
{
    public function savePracovisko(Request $request)
    {
        $newPracovisko = new Pracovisko();
        $newPracovisko->nazov = $request->input('nazov', "nic");
        $newPracovisko->save();

        return response()->json([
            "pracovisko_id" => $newPracovisko->id
        ]);
    }

    public function getPracovisko(int $id)
    {
        $pracovisko = Pracovisko::find($id);
        if($pracovisko) {
            return response()->json($pracovisko);
        } else {
            return response()->json("Nie je mozne najst pracovisko.", 404);
        }
    }

    public function deletePracovisko(int $id)
    {
        $pracovisko = Pracovisko::find($id);

        if($pracovisko) {
            $pracovisko->delete();
            return response()->json("Pracovisko odstranene.");
        } else {
            return response()->json("Nie je mozne najst pracovisko.", 404);
        }
    }

    public function getAllPracovisko()
    {
        $pracoviska = Pracovisko::all();
        return response()->json($pracoviska);
    }

    public function updatePracovisko(Request $request)
    {
        $id = $request->input('id', 0);

        $pracovisko = Pracovisko::findOrFail($id);

        $pracovisko->nazov = $request->input('nazov');

        $pracovisko->update();

        return response()->json($pracovisko);
    }

}
