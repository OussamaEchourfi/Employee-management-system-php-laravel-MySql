<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Demandes de Congé - {{ $employe->nomComplet }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .conge-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: none;
            margin-bottom: 1.5rem;
            transition: transform 0.2s ease;
        }
        
        .conge-card:hover {
            transform: translateY(-2px);
        }
        
        .status-badge {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-item {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: none;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
        }
        
        .btn-create {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('employe.dashboard') }}">
                <div class="me-3">
                    <i class="fas fa-arrow-left fa-lg"></i>
                </div>
                <div>
                    <span class="fw-bold">Retour au Tableau de Bord</span>
                </div>
            </a>
            
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        {{ $employe->nomComplet }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('employe.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>Tableau de Bord
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('employe.profile') }}">
                            <i class="fas fa-user me-2"></i>Mon Profil
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('employe.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Page Header -->
        <div class="page-header">
            <h2 class="mb-3">
                <i class="fas fa-calendar-alt me-3"></i>
                Mes Demandes de Congé
            </h2>
            <p class="mb-0 opacity-75">
                Gérez vos demandes de congé et suivez leur statut
            </p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon bg-primary">
                    <i class="fas fa-calendar"></i>
                </div>
                <h4 class="mb-1">{{ $conges->count() }}</h4>
                <small class="text-muted">Total des demandes</small>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon bg-warning">
                    <i class="fas fa-clock"></i>
                </div>
                <h4 class="mb-1">{{ $conges->where('status', 'pending')->count() }}</h4>
                <small class="text-muted">En attente</small>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon bg-success">
                    <i class="fas fa-check"></i>
                </div>
                <h4 class="mb-1">{{ $conges->where('status', 'approved')->count() }}</h4>
                <small class="text-muted">Approuvées</small>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon bg-danger">
                    <i class="fas fa-times"></i>
                </div>
                <h4 class="mb-1">{{ $conges->where('status', 'rejected')->count() }}</h4>
                <small class="text-muted">Rejetées</small>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">
                <i class="fas fa-list me-2 text-primary"></i>
                Liste des Demandes
            </h4>
            <a href="{{ route('employe.conges.create') }}" class="btn btn-create text-white">
                <i class="fas fa-plus me-2"></i>
                Nouvelle Demande
            </a>
        </div>

        <!-- Conges List -->
        @if($conges->count() > 0)
            @foreach($conges as $conge)
                <div class="card conge-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center mb-2">
                                    <h5 class="card-title mb-0 me-3">{{ $conge->droitConge }}</h5>
                                    <span class="status-badge status-{{ $conge->status }}">
                                        @switch($conge->status)
                                            @case('pending')
                                                ⏳ En attente
                                                @break
                                            @case('approved')
                                                ✅ Approuvé
                                                @break
                                            @case('rejected')
                                                ❌ Rejeté
                                                @break
                                        @endswitch
                                    </span>
                                </div>
                                
                                <div class="row text-muted">
                                    <div class="col-md-4">
                                        <i class="fas fa-calendar-day me-2"></i>
                                        <strong>Départ:</strong> {{ $conge->dataDepart ? $conge->dataDepart->format('d/m/Y') : 'Non définie' }}
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fas fa-calendar-check me-2"></i>
                                        <strong>Retour:</strong> {{ $conge->dateRetour ? $conge->dateRetour->format('d/m/Y') : 'Non définie' }}
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fas fa-clock me-2"></i>
                                        <strong>Durée:</strong> {{ $conge->duree }} jour(s)
                                    </div>
                                </div>
                                
                                @if($conge->motif)
                                    <div class="mt-2">
                                        <i class="fas fa-comment me-2 text-muted"></i>
                                        <small>{{ Str::limit($conge->motif, 100) }}</small>
                                    </div>
                                @endif
                                
                                <div class="mt-2 text-muted">
                                    <small>
                                        <i class="fas fa-calendar-plus me-1"></i>
                                                                                    Soumise le {{ $conge->created_at ? $conge->created_at->format('d/m/Y à H:i') : 'Date inconnue' }}
                                    </small>
                                </div>
                            </div>
                            
                            <div class="col-md-4 text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('employe.conges.show', $conge->id) }}" 
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>
                                        Voir
                                    </a>
                                    
                                    @if($conge->status === 'pending')
                                        <a href="{{ route('employe.conges.edit', $conge->id) }}" 
                                           class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit me-1"></i>
                                            Modifier
                                        </a>
                                        
                                        <form action="{{ route('employe.conges.destroy', $conge->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
                                                <i class="fas fa-trash me-1"></i>
                                                Supprimer
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                
                                @if($conge->admin_comment)
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-comment-dots me-1"></i>
                                            <strong>Commentaire admin:</strong> {{ Str::limit($conge->admin_comment, 50) }}
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-5">
                <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
                <h5 class="text-muted">Aucune demande de congé</h5>
                <p class="text-muted">Vous n'avez pas encore soumis de demande de congé.</p>
                <a href="{{ route('employe.conges.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Créer ma première demande
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
