<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Service;
use App\Models\Devision;
use App\Models\Conge;
use App\Models\Attestation;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // Statistiques de base
        $totalEmployes = Employe::count();
        $totalServices = Service::count();
        $totalDivisions = Devision::count();
        $totalConges = Conge::count();
        $totalAttestations = Attestation::count();
        
        // Statistiques par division (calculées manuellement)
        $employesParDivision = Devision::all()->map(function ($division) {
            $employesCount = Employe::whereHas('service', function($q) use ($division) {
                $q->where('Iddivision', $division->id);
            })->count();
            
            return [
                'division' => $division->nomD,
                'employes' => $employesCount
            ];
        });
        
        // Statistiques par service
        $employesParService = Service::all()->map(function ($service) {
            $employesCount = Employe::where('Idservice', $service->id)->count();
            
            return [
                'service' => $service->titre,
                'employes' => $employesCount
            ];
        });
        
        // Statistiques des congés par mois (6 derniers mois)
        $congesParMois = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $congesParMois[] = [
                'mois' => $date->format('M Y'),
                'conges' => Conge::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count()
            ];
        }
        
        // Répartition des types de congés
        $typesConges = Conge::select('droitConge', DB::raw('count(*) as total'))
            ->groupBy('droitConge')
            ->get()
            ->map(function ($item) {
                return [
                    'type' => $item->droitConge ?: 'Non spécifié',
                    'total' => $item->total
                ];
            });
        
        // Répartition des types d'attestations
        $typesAttestations = Attestation::select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->get()
            ->map(function ($item) {
                return [
                    'type' => $item->type ?: 'Non spécifié',
                    'total' => $item->total
                ];
            });
        
        // Statistiques de croissance (employés par année)
        $croissanceEmployes = [];
        for ($i = 4; $i >= 0; $i--) {
            $annee = now()->subYears($i)->year;
            $croissanceEmployes[] = [
                'annee' => $annee,
                'employes' => Employe::whereYear('created_at', $annee)->count()
            ];
        }
        
        return view('statistics.index', compact(
            'totalEmployes',
            'totalServices',
            'totalDivisions',
            'totalConges',
            'totalAttestations',
            'employesParDivision',
            'employesParService',
            'congesParMois',
            'typesConges',
            'typesAttestations',
            'croissanceEmployes'
        ));
    }
}
