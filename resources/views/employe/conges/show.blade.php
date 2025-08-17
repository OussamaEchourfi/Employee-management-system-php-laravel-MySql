<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Congé - {{ $employe->nomComplet }}</title>
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
        
        .detail-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: none;
            overflow: hidden;
        }
        
        .detail-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
        }
        
        .detail-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .detail-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1;
        }
        
        .detail-header h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }
        
        .detail-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
            position: relative;
            z-index: 1;
        }
        
        .detail-body {
            padding: 3rem 2rem;
        }
        
        .detail-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #e9ecef;
        }
        
        .section-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #dee2e6;
        }
        
        .info-item {
            background: white;
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
        
        .status-badge {
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            display: inline-block;
        }
        
        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }
        
        .admin-comment {
            background: #e3f2fd;
            border-radius: 15px;
            padding: 1.5rem;
            border-left: 4px solid #2196f3;
        }
        
        .btn {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        @media (max-width: 768px) {
            .detail-header {
                padding: 2rem 1rem;
            }
            
            .detail-body {
                padding: 2rem 1rem;
            }
            
            .detail-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('employe.conges.index') }}">
                <div class="me-3">
                    <i class="fas fa-arrow-left fa-lg"></i>
                </div>
                <div>
                    <span class="fw-bold">Retour aux Demandes</span>
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="detail-card">
                    <div class="detail-header">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>{{ $conge->droitConge }}</h3>
                        <p>Détails de la demande de congé</p>
                    </div>
                    
                    <div class="detail-body">
                        <!-- Statut -->
                        <div class="detail-section">
                            <h5 class="section-title">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Statut de la Demande
                            </h5>
                            
                            <div class="text-center">
                                <span class="status-badge status-{{ $conge->status }}">
                                    @switch($conge->status)
                                        @case('pending')
                                            ⏳ En attente d'approbation
                                            @break
                                        @case('approved')
                                            ✅ Demande approuvée
                                            @break
                                        @case('rejected')
                                            ❌ Demande rejetée
                                            @break
                                    @endswitch
                                </span>
                            </div>
                            
                            @if($conge->processed_at)
                                <div class="text-center mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        Traitée le {{ $conge->processed_at->format('d/m/Y à H:i') }}
                                    </small>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Informations du congé -->
                        <div class="detail-section">
                            <h5 class="section-title">
                                <i class="fas fa-calendar-alt text-warning me-2"></i>
                                Informations du Congé
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-calendar-day me-2"></i>Date de départ
                                        </div>
                                        <div class="info-value">{{ $conge->dataDepart->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">
                                            <i class="fas fa-calendar-check me-2"></i>Date de retour
                                        </div>
                                        <div class="info-value">{{ $conge->dateRetour->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-clock me-2"></i>Durée du congé
                                </div>
                                <div class="info-value">{{ $conge->duree }} jour(s)</div>
                            </div>
                            
                            @if($conge->motif)
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-comment me-2"></i>Motif du congé
                                    </div>
                                    <div class="info-value">{{ $conge->motif }}</div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Informations de soumission -->
                        <div class="detail-section">
                            <h5 class="section-title">
                                <i class="fas fa-history text-info me-2"></i>
                                Informations de Soumission
                            </h5>
                            
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-calendar-plus me-2"></i>Date de soumission
                                </div>
                                <div class="info-value">{{ $conge->created_at->format('d/m/Y à H:i') }}</div>
                            </div>
                            
                            @if($conge->updated_at && $conge->updated_at != $conge->created_at)
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-edit me-2"></i>Dernière modification
                                    </div>
                                    <div class="info-value">{{ $conge->updated_at->format('d/m/Y à H:i') }}</div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Commentaire de l'admin -->
                        @if($conge->admin_comment)
                            <div class="detail-section">
                                <h5 class="section-title">
                                    <i class="fas fa-comment-dots text-success me-2"></i>
                                    Commentaire de l'Administrateur
                                </h5>
                                
                                <div class="admin-comment">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-user-tie me-3 mt-1 text-primary"></i>
                                        <div>
                                            <p class="mb-0 fw-bold">Réponse de l'administration :</p>
                                            <p class="mb-0 mt-2">{{ $conge->admin_comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Actions -->
                        <div class="detail-section">
                            <h5 class="section-title">
                                <i class="fas fa-cogs text-secondary me-2"></i>
                                Actions
                            </h5>
                            
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('employe.conges.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Retour à la liste
                                </a>
                                
                                @if($conge->status === 'pending')
                                    <a href="{{ route('employe.conges.edit', $conge->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-2"></i>
                                        Modifier
                                    </a>
                                    
                                    <form action="{{ route('employe.conges.destroy', $conge->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
                                            <i class="fas fa-trash me-2"></i>
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
