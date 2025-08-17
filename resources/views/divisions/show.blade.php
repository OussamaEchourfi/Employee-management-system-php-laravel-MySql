@extends('adminlte::page')

@section('title', 'Détails de la Division - OG COMMUNICATION')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-sitemap mr-2"></i>
                    Détails de la Division
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('divisions.index') }}">Divisions</a></li>
                    <li class="breadcrumb-item active">Détails</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <!-- Division Details Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        Informations de la Division
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group">
                                <label class="info-label">Nom de la Division:</label>
                                <p class="info-value">{{ $division->nomD }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group">
                                <label class="info-label">ID de la Division:</label>
                                <p class="info-value">{{ $division->id }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="info-group">
                                <label class="info-label">Date de création:</label>
                                <p class="info-value">{{ $division->created_at ? $division->created_at->format('d/m/Y H:i') : 'Non spécifiée' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group">
                                <label class="info-label">Dernière modification:</label>
                                <p class="info-value">{{ $division->updated_at ? $division->updated_at->format('d/m/Y H:i') : 'Non spécifiée' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services in this Division -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-briefcase text-success mr-2"></i>
                        Services de cette Division
                    </h3>
                </div>
                <div class="card-body">
                    @php
                        $services = \App\Models\Service::where('division_id', $division->id)->get();
                    @endphp
                    
                    @if($services->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Service</th>
                                        <th>Description</th>
                                        <th>Responsable</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                        <td>
                                            <i class="fas fa-briefcase text-primary mr-2"></i>
                                            {{ $service->titre }}
                                        </td>
                                        <td>{{ $service->description ?: 'Aucune description' }}</td>
                                        <td>{{ $service->responsable ?: 'Non spécifié' }}</td>
                                        <td>
                                            <a href="{{ route('servicess.show', $service->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> Voir
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Aucun service trouvé dans cette division</p>
                            <a href="{{ route('servicess.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Ajouter un Service
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Actions Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cogs text-warning mr-2"></i>
                        Actions
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit mr-2"></i>
                            Modifier la Division
                        </a>
                        
                        <a href="{{ route('servicess.create') }}" class="btn btn-success">
                            <i class="fas fa-plus mr-2"></i>
                            Ajouter un Service
                        </a>
                        
                        <a href="{{ route('divisions.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Retour à la Liste
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie text-info mr-2"></i>
                        Statistiques
                    </h3>
                </div>
                <div class="card-body">
                    <div class="stat-item">
                        <div class="stat-icon bg-primary">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="stat-content">
                            <h4 class="stat-number">{{ $services->count() }}</h4>
                            <p class="stat-label">Services</p>
                        </div>
                    </div>
                    
                    <div class="stat-item mt-3">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            @php
                                $totalEmployes = \App\Models\Employe::whereHas('service', function($q) use ($division) {
                                    $q->where('division_id', $division->id);
                                })->count();
                            @endphp
                            <h4 class="stat-number">{{ $totalEmployes }}</h4>
                            <p class="stat-label">Employés</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .info-group {
        margin-bottom: 1rem;
    }
    
    .info-label {
        font-weight: 600;
        color: #6c757d;
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-value {
        font-size: 1.1rem;
        color: #2d3748;
        margin: 0;
        padding: 0.5rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }
    
    .stat-content {
        flex: 1;
    }
    
    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        color: #2d3748;
    }
    
    .stat-label {
        font-size: 0.9rem;
        color: #6c757d;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .card {
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-radius: 15px;
    }
    
    .card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 1px solid #dee2e6;
        border-radius: 15px 15px 0 0;
    }
    
    .card-title {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3748;
    }
    
    .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }
    
    .table th {
        border-top: none;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    .table td {
        vertical-align: middle;
    }
</style>
@stop
