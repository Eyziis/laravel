<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Locataire;
use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LocataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (count($request->all()) >= 1) {
                if ($request->typeRecherche === "commencePar") {
                    $locataires = Locataire::where('nom', 'LIKE', $request->nom . '%')->get();
                } else {
                    $locataires = Locataire::where('nom', 'LIKE', '%' . $request->nom . '%')->get();
                }
            } else {
                $locataires = Locataire::all();
            }
            foreach ($locataires as $locataire) {
                $locataire->logement->adresse;
                $locataire['adr'] = $locataire->logement->adresse->adresseComplete();
            }
            return response()->json(array('locataires' => $locataires), 200);
        }
        if (count($request->all()) >= 1) {
            if ($request->typeRecherche === "commencePar") {
                $locataires = Locataire::where('nom', 'LIKE', $request->nom . '%')->get();
            } else {
                $locataires = Locataire::where('nom', 'LIKE', '%' . $request->nom . '%')->get();
            }
        } else {
            $locataires = Locataire::all();
        }

        return view('signaletique.locataire')->with(['locataires' => $locataires]);

    }

    public function searchAjax(Request $request)
    {
        $msg = "This is a simple message.";
        $msg = $request->nom;
        return response()->json(array('msg' => $msg), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        switch ($request->input('action')) {
            case 'save':
                $locataire = new Locataire;
                $locataire->nom = $request->nom;
                $locataire->age = $request->age;
                $locataire->date_e = $request->date_e;
                $locataire->save();
                return redirect('signaletique\locataire');
                break;

            case 'update':
                $locataire = Locataire::find($request->id);
                if ($locataire) {
                    $locataire->age = $request->age;
                    $locataire->nom = $request->nom;
                    $locataire->update();
                }
                break;

            case 'delete':
                $locataire = Locataire::find($request->id);
                if ($locataire) {
                    $this->destroy($locataire);
                }
                break;
        }
        $request2 = new \Illuminate\Http\Request();
        return $this->index($request2);
    }

    /**
     * Display the specified resource.
     */
    public function show(Locataire $Locataire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locataire $Locataire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocataireRequest $request, Locataire $Locataire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locataire $Locataire)
    {
        //
        $Locataire->delete();
    }

}


//Logement::with
