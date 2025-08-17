<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - {{ $employe->nomComplet }}</title>
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
        
        .profile-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
        }
        
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: 20px 20px 0 0;
            text-align: center;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 3rem;
        }
        
        .info-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid #667eea;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .info-value {
            color: #2c3e50;
            font-size: 1.1rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="mb-2">{{ $employe->nomComplet }}</h3>
                        <p class="mb-0 opacity-75">
                            <i class="fas fa-briefcase me-2"></i>
                            {{ $employe->service->titre ?? 'Service non défini' }}
                        </p>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Personal Information -->
                        <h5 class="mb-3">
                            <i class="fas fa-user me-2 text-primary"></i>
                            Informations Personnelles
                        </h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-id-card me-2"></i>CIN
                                    </div>
                                    <div class="info-value">{{ $employe->cin }}</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-calendar me-2"></i>Date d'embauche
                                    </div>
                                    <div class="info-value">{{ $employe->hire_date ? $employe->hire_date->format('d/m/Y') : 'Non définie' }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone me-2"></i>Téléphone
                                    </div>
                                    <div class="info-value">{{ $employe->phone }}</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-map-marker-alt me-2"></i>Ville
                                    </div>
                                    <div class="info-value">{{ $employe->city }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-map me-2"></i>Adresse
                            </div>
                            <div class="info-value">{{ $employe->address }}</div>
                        </div>
                        
                        <!-- Service Information -->
                        <h5 class="mb-3 mt-4">
                            <i class="fas fa-sitemap me-2 text-primary"></i>
                            Informations du Service
                        </h5>
                        
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-briefcase me-2"></i>Service
                            </div>
                            <div class="info-value">{{ $employe->service->titre ?? 'Non défini' }}</div>
                        </div>
                        
                        @if($employe->service && $employe->service->division)
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-layer-group me-2"></i>Division
                            </div>
                            <div class="info-value">{{ $employe->service->division->nomD ?? 'Non défini' }}</div>
                        </div>
                        @endif
                        
                        <!-- Task Statistics -->
                        <h5 class="mb-3 mt-4">
                            <i class="fas fa-chart-bar me-2 text-primary"></i>
                            Statistiques des Tâches
                        </h5>
                        
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-icon bg-primary">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <h4 class="mb-1">{{ $employe->tasks->count() }}</h4>
                                <small class="text-muted">Total des tâches</small>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-icon bg-warning">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4 class="mb-1">{{ $employe->tasks->where('status', 'pending')->count() }}</h4>
                                <small class="text-muted">En attente</small>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-icon bg-info">
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <h4 class="mb-1">{{ $employe->tasks->where('status', 'in_progress')->count() }}</h4>
                                <small class="text-muted">En cours</small>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-icon bg-success">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h4 class="mb-1">{{ $employe->tasks->where('status', 'completed')->count() }}</h4>
                                <small class="text-muted">Terminées</small>
                            </div>
                        </div>
                        
                        <!-- Recent Tasks -->
                        <h5 class="mb-3 mt-4">
                            <i class="fas fa-history me-2 text-primary"></i>
                            Tâches Récentes
                        </h5>
                        
                        @if($employe->tasks->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tâche</th>
                                            <th>Statut</th>
                                            <th>Priorité</th>
                                            <th>Date limite</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employe->tasks->take(5) as $task)
                                            <tr>
                                                <td>
                                                    <strong>{{ $task->title }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ Str::limit($task->description, 50) }}</small>
                                                </td>
                                                <td>
                                                    @switch($task->status)
                                                        @case('pending')
                                                            <span class="badge bg-warning">En attente</span>
                                                            @break
                                                        @case('in_progress')
                                                            <span class="badge bg-info">En cours</span>
                                                            @break
                                                        @case('completed')
                                                            <span class="badge bg-success">Terminée</span>
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td>
                                                    @switch($task->priority)
                                                        @case('low')
                                                            <span class="badge bg-secondary">Faible</span>
                                                            @break
                                                        @case('medium')
                                                            <span class="badge bg-info">Moyenne</span>
                                                            @break
                                                        @case('high')
                                                            <span class="badge bg-warning">Élevée</span>
                                                            @break
                                                        @case('urgent')
                                                            <span class="badge bg-danger">Urgente</span>
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td>
                                                    @if($task->due_date < now() && $task->status !== 'completed')
                                                        <span class="text-danger fw-bold">{{ $task->due_date->format('d/m/Y') }}</span>
                                                        <br><small class="text-danger">En retard</small>
                                                    @else
                                                        {{ $task->due_date->format('d/m/Y') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="text-center mt-3">
                                <a href="{{ route('employe.dashboard') }}" class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i>
                                    Voir toutes mes tâches
                                </a>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h6 class="text-muted">Aucune tâche assignée</h6>
                                <p class="text-muted">Vous n'avez pas encore de tâches assignées.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
