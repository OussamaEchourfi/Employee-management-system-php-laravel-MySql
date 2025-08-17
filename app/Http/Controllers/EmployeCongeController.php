<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeCongeController extends Controller
{
    /**
     * Afficher la liste des congés de l'employé
     */
    public function index()
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $employe = Employe::with('service')->find(session('employe_id'));
        
        if (!$employe) {
            return redirect()->route('employe.login')->withErrors('Employé non trouvé.');
        }

        $conges = Conge::where('employID', session('employe_id'))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employe.conges.index', compact('employe', 'conges'));
    }

    /**
     * Afficher le formulaire de demande de congé
     */
    public function create()
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $employe = Employe::find(session('employe_id'));
        return view('employe.conges.create', compact('employe'));
    }

    /**
     * Stocker une nouvelle demande de congé
     */
    public function store(Request $request)
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $validator = Validator::make($request->all(), [
            'droitConge' => 'required|string|max:255',
            'duree' => 'required|integer|min:1|max:365',
            'dataDepart' => 'required|date|after:today',
            'dateRetour' => 'required|date|after:dataDepart',
            'motif' => 'required|string|max:1000',
        ], [
            'droitConge.required' => 'Le type de congé est obligatoire.',
            'duree.required' => 'La durée est obligatoire.',
            'duree.min' => 'La durée doit être d\'au moins 1 jour.',
            'duree.max' => 'La durée ne peut pas dépasser 365 jours.',
            'dataDepart.required' => 'La date de départ est obligatoire.',
            'dataDepart.after' => 'La date de départ doit être dans le futur.',
            'dateRetour.required' => 'La date de retour est obligatoire.',
            'dateRetour.after' => 'La date de retour doit être après la date de départ.',
            'motif.required' => 'Le motif est obligatoire.',
            'motif.max' => 'Le motif ne peut pas dépasser 1000 caractères.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Calculer la durée réelle
        $dateDepart = \Carbon\Carbon::parse($request->dataDepart);
        $dateRetour = \Carbon\Carbon::parse($request->dateRetour);
        $dureeReelle = $dateDepart->diffInDays($dateRetour) + 1;

        // Créer la demande de congé
        $conge = Conge::create([
            'employID' => session('employe_id'),
            'droitConge' => $request->droitConge,
            'duree' => $dureeReelle,
            'dataDepart' => $request->dataDepart,
            'dateRetour' => $request->dateRetour,
            'motif' => $request->motif,
            'status' => 'pending',
        ]);

        return redirect()->route('employe.conges.index')
            ->with('success', 'Votre demande de congé a été soumise avec succès et est en attente d\'approbation.');
    }

    /**
     * Afficher les détails d'un congé
     */
    public function show($id)
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $conge = Conge::where('id', $id)
            ->where('employID', session('employe_id'))
            ->firstOrFail();

        $employe = Employe::find(session('employe_id'));

        return view('employe.conges.show', compact('conge', 'employe'));
    }

    /**
     * Afficher le formulaire d'édition d'un congé
     */
    public function edit($id)
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $conge = Conge::where('id', $id)
            ->where('employID', session('employe_id'))
            ->where('status', 'pending')
            ->firstOrFail();

        $employe = Employe::find(session('employe_id'));

        return view('employe.conges.edit', compact('conge', 'employe'));
    }

    /**
     * Mettre à jour un congé
     */
    public function update(Request $request, $id)
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $conge = Conge::where('id', $id)
            ->where('employID', session('employe_id'))
            ->where('status', 'pending')
            ->firstOrFail();

        $validator = Validator::make($request->all(), [
            'droitConge' => 'required|string|max:255',
            'duree' => 'required|integer|min:1|max:365',
            'dataDepart' => 'required|date|after:today',
            'dateRetour' => 'required|date|after:dataDepart',
            'motif' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Calculer la durée réelle
        $dateDepart = \Carbon\Carbon::parse($request->dataDepart);
        $dateRetour = \Carbon\Carbon::parse($request->dateRetour);
        $dureeReelle = $dateDepart->diffInDays($dateRetour) + 1;

        $conge->update([
            'droitConge' => $request->droitConge,
            'duree' => $dureeReelle,
            'dataDepart' => $request->dataDepart,
            'dateRetour' => $request->dateRetour,
            'motif' => $request->motif,
        ]);

        return redirect()->route('employe.conges.index')
            ->with('success', 'Votre demande de congé a été mise à jour avec succès.');
    }

    /**
     * Supprimer un congé (seulement si en attente)
     */
    public function destroy($id)
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $conge = Conge::where('id', $id)
            ->where('employID', session('employe_id'))
            ->where('status', 'pending')
            ->firstOrFail();

        $conge->delete();

        return redirect()->route('employe.conges.index')
            ->with('success', 'Votre demande de congé a été supprimée avec succès.');
    }
}
