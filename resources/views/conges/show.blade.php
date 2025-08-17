@extends('adminlte::page')

@section('title', 'Employes Management System | Détails du Congé')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Leave Header -->
            <div class="leave-header mb-4">
                <div class="leave-cover">
                    <div class="leave-icon">
                        <i class="fas fa-umbrella-beach"></i>
                    </div>
                    <div class="leave-info">
                        <h1 class="leave-title">Demande de Congé</h1>
                        <p class="leave-subtitle">
                            @if($conge->employe)
                                {{ $conge->employe->nomComplet }}
                            @else
                                Employé non trouvé
                            @endif
                        </p>
                        <div class="leave-status">
                            <span class="status-badge status-pending">
                                <i class="fas fa-clock"></i>
                                En attente
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Employee Information -->
                <div class="col-lg-6">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-user-tie"></i>
                            <h3>Informations de l'Employé</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user"></i>
                                        Nom et Prénom
                                    </div>
                                    <div class="info-value">
                                        @if($conge->employe)
                                            {{ $conge->employe->nomComplet }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-id-card"></i>
                                        CIN
                                    </div>
                                    <div class="info-value">
                                        @if($conge->employe)
                                            {{ $conge->employe->cin }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </div>
                                    <div class="info-value">
                                        @if($conge->employe)
                                            {{ $conge->employe->phone }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-sitemap"></i>
                                        Division
                                    </div>
                                    <div class="info-value">
                                        @if($conge->employe && $conge->employe->service && $conge->employe->service->division)
                                            {{ $conge->employe->service->division->nomD }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-cogs"></i>
                                        Service
                                    </div>
                                    <div class="info-value">
                                        @if($conge->employe && $conge->employe->service)
                                            {{ $conge->employe->service->titre }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leave Details -->
                <div class="col-lg-6">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-calendar-alt"></i>
                            <h3>Détails du Congé</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="leave-details">
                                <div class="leave-item">
                                    <div class="leave-icon-small">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div class="leave-details-content">
                                        <div class="leave-label">Type d'absence</div>
                                        <div class="leave-value">{{ $conge->droitConge }}</div>
                                    </div>
                                </div>

                                <div class="leave-item">
                                    <div class="leave-icon-small">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="leave-details-content">
                                        <div class="leave-label">Durée</div>
                                        <div class="leave-value">{{ $conge->duree }} jours</div>
                                    </div>
                                </div>

                                <div class="leave-item">
                                    <div class="leave-icon-small">
                                        <i class="fas fa-plane-departure"></i>
                                    </div>
                                    <div class="leave-details-content">
                                        <div class="leave-label">Date de départ</div>
                                        <div class="leave-value">{{ $conge->dataDepart }}</div>
                                    </div>
                                </div>

                                <div class="leave-item">
                                    <div class="leave-icon-small">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div class="leave-details-content">
                                        <div class="leave-label">Date de création</div>
                                        <div class="leave-value">{{ $conge->created_at ? $conge->created_at->format('d/m/Y') : 'Date inconnue' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('conges.edit', $conge->id) }}" class="btn-modern btn-primary">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                <a href="{{ route('conges.vacation', $conge->id) }}" class="btn-modern btn-success">
                    <i class="fas fa-print"></i>
                    Imprimer
                </a>
                <a href="{{ route('conges.index') }}" class="btn-modern btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    /* Modern Leave Design */
    .leave-header {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
        border-radius: 20px;
        padding: 0;
        margin-bottom: 2rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .leave-cover {
        position: relative;
        padding: 3rem 2rem;
        text-align: center;
        color: white;
    }

    .leave-icon {
        width: 120px;
        height: 120px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(10px);
    }

    .leave-icon i {
        font-size: 3rem;
        color: white;
    }

    .leave-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .leave-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0 0 1rem;
    }

    .leave-status {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .status-badge {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
    }

    .status-pending {
        background: rgba(255, 193, 7, 0.3);
        color: #856404;
        border: 1px solid rgba(255, 193, 7, 0.5);
    }

    /* Modern Cards */
    .info-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: white;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .card-header-modern i {
        font-size: 1.5rem;
    }

    .card-header-modern h3 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 600;
    }

    .card-body-modern {
        padding: 2rem;
    }

    /* Information Grid */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .info-item {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        padding: 1.5rem;
        transition: transform 0.3s ease;
    }

    .info-item:hover {
        transform: translateY(-3px);
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-label i {
        color: #ff9a9e;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: #2d3748;
        word-wrap: break-word;
    }

    .text-muted {
        color: #718096 !important;
        font-style: italic;
    }

    /* Leave Details */
    .leave-details {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .leave-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .leave-item:hover {
        transform: translateX(5px);
    }

    .leave-icon-small {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .leave-details-content {
        flex: 1;
    }

    .leave-label {
        font-size: 0.8rem;
        color: #4a5568;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .leave-value {
        font-size: 1rem;
        font-weight: 600;
        color: #2d3748;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-modern {
        padding: 0.75rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(255, 154, 158, 0.4);
        color: white;
    }

    .btn-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: white;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(168, 237, 234, 0.4);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .leave-title {
            font-size: 2rem;
        }

        .leave-subtitle {
            font-size: 1rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-modern {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .leave-cover {
            padding: 2rem 1rem;
        }

        .leave-icon {
            width: 100px;
            height: 100px;
        }

        .leave-icon i {
            font-size: 2.5rem;
        }

        .card-header-modern {
            padding: 1rem;
        }

        .card-body-modern {
            padding: 1.5rem;
        }
    }
</style>
@endsection