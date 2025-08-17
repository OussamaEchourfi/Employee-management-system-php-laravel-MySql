<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use App\Models\Devision;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function index()
    {
        $attestations = Attestation::with('employe')->get();
        return view('attestations.index', compact('attestations'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('attestations.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $data['employID'] = $request->employID;
        Attestation::create($data);
        return redirect()->route("attestations.index")->with([
            "success" => "attestation ajouté avec succès"
        ]);
    }

    public function show($id)
    {
        $attestation = Attestation::with('employe.service.division')->findOrFail($id);
        return view('attestations.show', compact('attestation'));
    }

    public function edit($id)
    {
        $attestation = Attestation::findOrFail($id);
        $employes = Employe::all();
        return view('attestations.edit', compact('attestation', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $dataU['employID'] = $request->employID;
        $dataU['updated_at'] = date('Y-m-d H:m:s');
        Attestation::where(['id' => $id])->update($dataU);
        return redirect()->route('attestations.index')->with([
            "success" => "attestation modifier avec succés"
        ]);
    }

    public function destroy($id)
    {
        Attestation::where(['id' => $id])->delete();
        return redirect()->route("attestations.index")->with([
            "success" => "attestation Supprimé avec succès"
        ]);
    }

    public function certificate($id)
    {
        $attestation = Attestation::with('employe.service.division')->findOrFail($id);
        return view('attestations.certificate', compact('attestation'));
    }
}
