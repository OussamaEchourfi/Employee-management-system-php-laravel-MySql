<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Devision;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges = Conge::with('employe')->get();
        return view('conges.index', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all();
        return view('conges.create', compact('employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['employID'] = $request->employID;
        $data['droitConge'] = $request->droitConge;
        $data['duree'] = $request->duree;
        $data['dataDepart'] = $request->dataDepart;
        Conge::create($data);
        return redirect()->route("conges.index")->with([
            "success" => "conge ajouté avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conge = Conge::with('employe.service.division')->findOrFail($id);
        return view('conges.show', compact('conge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conge = Conge::findOrFail($id);
        $employes = Employe::all();
        return view('conges.edit', compact('conge', 'employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataU['employID'] = $request->employID;
        $dataU['droitConge'] = $request->droitConge;
        $dataU['duree'] = $request->duree;
        $dataU['dataDepart'] = $request->dataDepart;
        $dataU['updated_at'] = date('Y-m-d H:m:s');
        Conge::where(['id' => $id])->update($dataU);
        return redirect()->route('conges.index')->with([
            "success" => "conge modifier avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conge = Conge::findOrFail($id);
        $conge->delete();
        
        return redirect()->route('conges.index')->with([
            "success" => "Congé supprimé avec succès"
        ]);
    }

    /**
     * Display the vacation form for printing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vacation($id)
    {
        $conge = Conge::with('employe.service.division')->findOrFail($id);
        return view('conges.vacation', compact('conge'));
    }
}
