@extends('adminlte::page')

@section('title', 'Employes Management System | Service Details')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Service Header -->
            <div class="service-header mb-4">
                <div class="service-cover">
                    <div class="service-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="service-info">
                        <h1 class="service-title">{{$service->titre ?? 'Service'}}</h1>
                        <p class="service-subtitle">Détails du Service</p>
                        <div class="service-stats">
                            <span class="stat-item">
                                <i class="fas fa-users"></i>
                                {{$service->employes_count ?? 0}} Employés
                            </span>
                            <span class="stat-item">
                                <i class="fas fa-sitemap"></i>
                                {{$service->division->nomD ?? 'Division'}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Service Information -->
                <div class="col-lg-8">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-info-circle"></i>
                            <h3>Informations du Service</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-tag"></i>
                                        Nom du Service
                                    </div>
                                    <div class="info-value">{{$service->titre ?? 'Non défini'}}</div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-align-left"></i>
                                        Description
                                    </div>
                                    <div class="info-value">{{$service->description ?? 'Aucune description disponible'}}</div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-sitemap"></i>
                                        Division
                                    </div>
                                    <div class="info-value">{{$service->division->nomD ?? 'Non définie'}}</div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user-tie"></i>
                                        Responsable
                                    </div>
                                    <div class="info-value">{{$service->responsable ?? 'Non défini'}}</div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-calendar-alt"></i>
                                        Date de création
                                    </div>
                                    <div class="info-value">{{$service->created_at ? $service->created_at->format('d/m/Y') : 'Non définie'}}</div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-clock"></i>
                                        Dernière mise à jour
                                    </div>
                                    <div class="info-value">{{$service->updated_at ? $service->updated_at->format('d/m/Y H:i') : 'Non définie'}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service Stats -->
                <div class="col-lg-4">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-chart-bar"></i>
                            <h3>Statistiques</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number">{{$service->employes_count ?? 0}}</div>
                                        <div class="stat-label">Employés</div>
                                    </div>
                                </div>

                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number">{{$service->conges_count ?? 0}}</div>
                                        <div class="stat-label">Congés</div>
                                    </div>
                                </div>

                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number">{{$service->attestations_count ?? 0}}</div>
                                        <div class="stat-label">Attestations</div>
                                    </div>
                                </div>

                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number">{{$service->projets_count ?? 0}}</div>
                                        <div class="stat-label">Projets</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employees List -->
            <div class="row">
                <div class="col-12">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-users"></i>
                            <h3>Employés du Service</h3>
                        </div>
                        <div class="card-body-modern">
                            @if(isset($service->employes) && $service->employes->count() > 0)
                                <div class="employees-grid">
                                    @foreach($service->employes as $employe)
                                        <div class="employee-card">
                                            <div class="employee-avatar">
                                                <i class="fas fa-user-circle"></i>
                                            </div>
                                            <div class="employee-content">
                                                <h4 class="employee-name">{{$employe->nomComplet}}</h4>
                                                <p class="employee-position">{{$employe->poste ?? 'Poste non défini'}}</p>
                                                <div class="employee-meta">
                                                    <span class="employee-phone">
                                                        <i class="fas fa-phone"></i>
                                                        {{$employe->phone}}
                                                    </span>
                                                    <span class="employee-email">
                                                        <i class="fas fa-envelope"></i>
                                                        {{$employe->email ?? 'Non défini'}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state">
                                    <i class="fas fa-users fa-3x"></i>
                                    <h4>Aucun employé trouvé</h4>
                                    <p>Ce service n'a pas encore d'employés assignés.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Activities -->
            <div class="row">
                <div class="col-12">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-history"></i>
                            <h3>Activités Récentes</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="activities-timeline">
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Service créé</div>
                                        <div class="activity-time">{{$service->created_at ? $service->created_at->diffForHumans() : 'Récemment'}}</div>
                                    </div>
                                </div>

                                @if($service->employes_count > 0)
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">{{$service->employes_count}} employé(s) assigné(s)</div>
                                        <div class="activity-time">Récemment</div>
                                    </div>
                                </div>
                                @endif

                                @if($service->conges_count > 0)
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">{{$service->conges_count}} demande(s) de congé</div>
                                        <div class="activity-time">Ce mois</div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('servicess.edit', $service->id ?? 1) }}" class="btn-modern btn-primary">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                <a href="{{ route('servicess.index') }}" class="btn-modern btn-secondary">
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
    /* Modern Service Design */
    .service-header {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border-radius: 20px;
        padding: 0;
        margin-bottom: 2rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .service-cover {
        position: relative;
        padding: 3rem 2rem;
        text-align: center;
        color: white;
    }

    .service-icon {
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

    .service-icon i {
        font-size: 3rem;
        color: white;
    }

    .service-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .service-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0 0 1rem;
    }

    .service-stats {
        display: flex;
        justify-content: center;
        gap: 2rem;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        opacity: 0.8;
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
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
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
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
        color: #fa709a;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: #2d3748;
        word-wrap: break-word;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .stat-card {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.2rem;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #4a5568;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Employees Grid */
    .employees-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .employee-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: transform 0.3s ease;
    }

    .employee-card:hover {
        transform: translateY(-3px);
    }

    .employee-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .employee-content {
        flex: 1;
    }

    .employee-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2d3748;
        margin: 0 0 0.5rem;
    }

    .employee-position {
        font-size: 0.9rem;
        color: #6c757d;
        margin: 0 0 1rem;
    }

    .employee-meta {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .employee-phone,
    .employee-email {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8rem;
        color: #4a5568;
    }

    /* Activities Timeline */
    .activities-timeline {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .activity-item:hover {
        transform: translateX(5px);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-size: 1rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .activity-time {
        font-size: 0.8rem;
        color: #6c757d;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }

    .empty-state i {
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state h4 {
        margin-bottom: 0.5rem;
        color: #4a5568;
    }

    .empty-state p {
        margin: 0;
        opacity: 0.7;
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
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(250, 112, 154, 0.4);
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
        .service-title {
            font-size: 2rem;
        }

        .service-subtitle {
            font-size: 1rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .employees-grid {
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
        .service-cover {
            padding: 2rem 1rem;
        }

        .service-icon {
            width: 100px;
            height: 100px;
        }

        .service-icon i {
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
