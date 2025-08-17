<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - {{ $employe->nomComplet }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .stats-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
        }
        
        .stats-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .stats-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin: 0 auto 1rem;
        }
        
        .task-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.4s ease;
            overflow: hidden;
            position: relative;
        }
        
        .task-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .task-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }
        
        .task-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }
        
        .task-body {
            padding: 1.5rem;
        }
        
        .task-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }
        
        .task-description {
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }
        
        .priority-badge {
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-badge {
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .task-meta {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1rem;
            margin-top: 1rem;
        }
        
        .task-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }
        
        .action-btn {
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .action-btn:hover {
            background: #667eea;
            color: white;
            transform: scale(1.1);
        }
        
        .dropdown-menu {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border: none;
            padding: 0.5rem;
        }
        
        .dropdown-item {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: #f8f9fa;
            transform: translateX(5px);
        }
        
        .overdue {
            border-left: 5px solid #dc3545;
            background: linear-gradient(135deg, #fff5f5 0%, #fff 100%);
        }
        
        .overdue::before {
            background: linear-gradient(90deg, #dc3545, #fd7e14);
        }
        
        .urgent {
            border-left: 5px solid #fd7e14;
            background: linear-gradient(135deg, #fff8f0 0%, #fff 100%);
        }
        
        .urgent::before {
            background: linear-gradient(90deg, #fd7e14, #ffc107);
        }
        
        .high {
            border-left: 5px solid #ffc107;
            background: linear-gradient(135deg, #fffbf0 0%, #fff 100%);
        }
        
        .high::before {
            background: linear-gradient(90deg, #ffc107, #17a2b8);
        }
        
        .medium {
            border-left: 5px solid #17a2b8;
            background: linear-gradient(135deg, #f0f9ff 0%, #fff 100%);
        }
        
        .medium::before {
            background: linear-gradient(90deg, #17a2b8, #6c757d);
        }
        
        .low {
            border-left: 5px solid #6c757d;
            background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
        }
        
        .low::before {
            background: linear-gradient(90deg, #6c757d, #adb5bd);
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 25px;
            padding: 2rem;
            color: white;
            text-align: center;
            margin-bottom: 2rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .alert-overdue {
            background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
            border: none;
            border-radius: 20px;
            color: white;
            padding: 1.5rem;
            box-shadow: 0 10px 25px rgba(220, 53, 69, 0.3);
        }
        
        .task-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .empty-icon {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 0.75rem;
            color: #667eea;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <div class="me-3">
                    <i class="fas fa-user-tie fa-2x"></i>
                </div>
                <div>
                    <span class="fw-bold">Espace Employé</span>
                    <small class="d-block opacity-75">{{ $employe->nomComplet }}</small>
                </div>
            </a>
            
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        {{ $employe->nomComplet }}
                    </a>
                    <ul class="dropdown-menu">
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
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2 class="welcome-title">
                <i class="fas fa-hand-wave me-3"></i>
                Bienvenue, {{ $employe->nomComplet }} !
            </h2>
            <p class="welcome-subtitle mb-0">
                <i class="fas fa-briefcase me-2"></i>
                {{ $employe->service->titre ?? 'Service non défini' }}
            </p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stats-card">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-primary">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3 class="mb-2 fw-bold">{{ $stats['total'] }}</h3>
                    <p class="text-muted mb-0">Total des tâches</p>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="mb-2 fw-bold">{{ $stats['pending'] }}</h3>
                    <p class="text-muted mb-0">En attente</p>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-info">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <h3 class="mb-2 fw-bold">{{ $stats['in_progress'] }}</h3>
                    <p class="text-muted mb-0">En cours</p>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-success">
                        <i class="fas fa-check"></i>
                    </div>
                    <h3 class="mb-2 fw-bold">{{ $stats['completed'] }}</h3>
                    <p class="text-muted mb-0">Terminées</p>
                </div>
            </div>
        </div>

        <!-- Conges Section -->
        <div class="card mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="section-title mb-0">
                        <i class="fas fa-calendar-alt"></i>
                        Mes Demandes de Congé
                    </h4>
                    <a href="{{ route('employe.conges.index') }}" class="btn btn-primary">
                        <i class="fas fa-calendar-plus me-2"></i>
                        Gérer mes congés
                    </a>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="text-center p-3">
                            <div class="stats-icon bg-primary" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <h5 class="mt-2 mb-1">{{ $congesStats['total'] }}</h5>
                            <small class="text-muted">Total</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center p-3">
                            <div class="stats-icon bg-warning" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h5 class="mt-2 mb-1">{{ $congesStats['pending'] }}</h5>
                            <small class="text-muted">En attente</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center p-3">
                            <div class="stats-icon bg-success" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="fas fa-check"></i>
                            </div>
                            <h5 class="mb-1">{{ $congesStats['approved'] }}</h5>
                            <small class="text-muted">Approuvées</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center p-3">
                            <div class="stats-icon bg-danger" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                <i class="fas fa-times"></i>
                            </div>
                            <h5 class="mt-2 mb-1">{{ $congesStats['rejected'] }}</h5>
                            <small class="text-muted">Rejetées</small>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-3">
                    <a href="{{ route('employe.conges.create') }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus me-2"></i>
                        Nouvelle demande de congé
                    </a>
                </div>
            </div>
        </div>

        @if($stats['overdue'] > 0)
        <div class="alert-overdue mb-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                <div>
                    <h5 class="mb-1 fw-bold">Attention !</h5>
                    <p class="mb-0">Vous avez {{ $stats['overdue'] }} tâche(s) en retard.</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Tasks Section -->
        <div class="card">
            <div class="card-body p-4">
                <h4 class="section-title">
                    <i class="fas fa-clipboard-list"></i>
                    Mes Tâches Assignées
                </h4>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($tasks->count() > 0)
                    <div class="task-grid">
                        @foreach($tasks as $task)
                            <div class="task-card 
                                @if($task->due_date < now() && $task->status !== 'completed') overdue
                                @elseif($task->priority === 'urgent') urgent
                                @elseif($task->priority === 'high') high
                                @elseif($task->priority === 'medium') medium
                                @else low @endif">
                                
                                <div class="task-actions">
                                    <div class="dropdown">
                                        <button class="action-btn" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('employe.tasks.update-status', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="pending">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-clock me-2"></i>En attente
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('employe.tasks.update-status', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="in_progress">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-spinner me-2"></i>En cours
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('employe.tasks.update-status', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="completed">
                                                    <button type="submit" class="dropdown-item text-success">
                                                        <i class="fas fa-check me-2"></i>Terminée
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="task-header">
                                    <h5 class="task-title">{{ $task->title }}</h5>
                                    <p class="task-description mb-0">
                                        {{ Str::limit($task->description, 100) }}
                                    </p>
                                </div>
                                
                                <div class="task-body">
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        @switch($task->priority)
                                            @case('low')
                                                <span class="badge bg-secondary priority-badge">Faible</span>
                                                @break
                                            @case('medium')
                                                <span class="badge bg-info priority-badge">Moyenne</span>
                                                @break
                                            @case('high')
                                                <span class="badge bg-warning priority-badge">Élevée</span>
                                                @break
                                            @case('urgent')
                                                <span class="badge bg-danger priority-badge">Urgente</span>
                                                @break
                                        @endswitch
                                        
                                        @switch($task->status)
                                            @case('pending')
                                                <span class="badge bg-warning status-badge">En attente</span>
                                                @break
                                            @case('in_progress')
                                                <span class="badge bg-info status-badge">En cours</span>
                                                @break
                                            @case('completed')
                                                <span class="badge bg-success status-badge">Terminée</span>
                                                @break
                                        @endswitch
                                    </div>
                                    
                                    <div class="task-meta">
                                        <div class="row">
                                            <div class="col-6">
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    Date limite
                                                </small>
                                                @if($task->due_date < now() && $task->status !== 'completed')
                                                    <span class="text-danger fw-bold">{{ $task->due_date->format('d/m/Y') }}</span>
                                                    <br><small class="text-danger">En retard</small>
                                                @else
                                                    <span class="fw-bold">{{ $task->due_date->format('d/m/Y') }}</span>
                                                @endif
                                            </div>
                                            
                                            @if($task->completed_at)
                                            <div class="col-6">
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-check-circle me-1"></i>
                                                    Terminée le
                                                </small>
                                                <span class="text-success fw-bold">{{ $task->completed_at->format('d/m/Y') }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <h5 class="text-muted">Aucune tâche assignée</h5>
                        <p class="text-muted">Vous n'avez pas encore de tâches assignées par l'administrateur.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
