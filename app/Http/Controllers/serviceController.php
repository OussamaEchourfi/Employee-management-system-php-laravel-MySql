<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Devision;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::withCount('employes')
            ->with('division')
            ->having('employes_count', '>', 0)
            ->get();
            
        return view('servicess.index')->with(['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Devision::all();
        return view('servicess.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['titre'] = $request->titre;
        $data['division_id'] = $request->division_id;

        Service::create($data);
        return redirect()->route("servicess.index")->with([
            "success" => "service ajouté avec succès"
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
        $service = Service::with('division')->findOrFail($id);
        return view('servicess.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $divisions = Devision::all();
        return view('servicess.edit', compact('service', 'divisions'));
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
        $dataU['titre'] = $request->titre;
        $dataU['division_id'] = $request->division_id;
        $dataU['updated_at'] = date('Y-m-d H:m:s');
        Service::where(['id' => $id])->update($dataU);
        return redirect()->route('servicess.index')->with([
            "success" => "service modifier avec succés"
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
        //
        Service::where(['id' => $id])->delete();;
        return redirect()->route("servicess.index")->with([
            "success" => "service Supprimé avec succès"
        ]);
    }
}
