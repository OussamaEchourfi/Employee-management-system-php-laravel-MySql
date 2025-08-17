<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conges = Conge::with('employe.service')->orderBy('created_at', 'desc')->get();
        $employes = Employe::orderBy('nomComplet')->get();
        
        return view('admin.conges.index', compact('conges', 'employes'));
    }

    /**
     * Afficher les détails d'une demande de congé
     */
    public function show($id)
    {
        $conge = Conge::with('employe.service')->findOrFail($id);
        return view('admin.conges.show', compact('conge'));
    }

    /**
     * Approuver une demande de congé
     */
    public function approve(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'admin_comment' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $conge = Conge::findOrFail($id);
        
        if ($conge->status !== 'pending') {
            return back()->with('error', 'Cette demande de congé a déjà été traitée.');
        }

        $conge->update([
            'status' => 'approved',
            'admin_comment' => $request->admin_comment,
            'processed_at' => now(),
        ]);

        return redirect()->route('admin.conges.index')
            ->with('success', 'La demande de congé a été approuvée avec succès.');
    }

    /**
     * Rejeter une demande de congé
     */
    public function reject(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'admin_comment' => 'required|string|max:1000',
        ], [
            'admin_comment.required' => 'Un commentaire est obligatoire pour rejeter une demande.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $conge = Conge::findOrFail($id);
        
        if ($conge->status !== 'pending') {
            return back()->with('error', 'Cette demande de congé a déjà été traitée.');
        }

        $conge->update([
            'status' => 'rejected',
            'admin_comment' => $request->admin_comment,
            'processed_at' => now(),
        ]);

        return redirect()->route('admin.conges.index')
            ->with('success', 'La demande de congé a été rejetée.');
    }

    /**
     * Filtrer les demandes de congé par statut
     */
    public function filter(Request $request)
    {
        $query = Conge::with('employe.service');

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('employe') && $request->employe) {
            $query->whereHas('employe', function($q) use ($request) {
                $q->where('nomComplet', 'like', '%' . $request->employe . '%');
            });
        }

        $conges = $query->orderBy('created_at', 'desc')->get();

        $stats = [
            'total' => $conges->count(),
            'pending' => $conges->where('status', 'pending')->count(),
            'approved' => $conges->where('status', 'approved')->count(),
            'rejected' => $conges->where('status', 'rejected')->count(),
        ];

        return view('admin.conges.index', compact('conges', 'stats'));
    }

    /**
     * Exporter les demandes de congé en PDF
     */
    public function export()
    {
        $conges = Conge::with('employe.service')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ici vous pouvez ajouter la logique d'export PDF
        // Pour l'instant, on retourne juste la vue
        return view('admin.conges.export', compact('conges'));
    }
}
