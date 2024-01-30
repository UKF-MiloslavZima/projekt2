<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirmaController extends Controller
{
    public function saveFirma(Request $request)
    {
        $newFirma = new Firma();
        $newFirma->nazov = $request->input('nazov', "nic");
        $newFirma->save();

        return response()->json([
            "firma_id" => $newFirma->id
        ]);
    }

    public function getFirma(int $id)
    {
        $firma = User::find($id);
        if($firma) {
            return response()->json($firma);
        } else {
            return response()->json("Nie je mozne najst firmu.", 404);
        }
    }

    public function deleteFima(int $id)
    {
        $firma = Firma::find($id);

        if($firma) {
            $firma->delete();
            return response()->json("Firma odstranena.");
        } else {
            return response()->json("Nie je mozne najst firmu.", 404);
        }
    }

    public function getAllFirma()
    {
        $firmy = Fima::all();
        return response()->json($firmy);
    }

    public function updateFirma(Request $request)
    {
        $id = $request->input('id', 0);

        $firma = Firma::findOrFail($id);

        $firma->nazov = $request->input('nazov');

        $firma->update();

        return response()->json($firma);
    }

}
