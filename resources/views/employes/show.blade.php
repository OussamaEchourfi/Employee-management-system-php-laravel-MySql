@extends('adminlte::page')

@section('title', 'Employes Management System | '.$employe->nomComplet)

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Profile Header -->
            <div class="profile-header mb-4">
                <div class="profile-cover">
                    <div class="profile-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="profile-info">
                        <h1 class="profile-name">{{$employe->nomComplet}}</h1>
                        <p class="profile-title">{{$services->titre}} - {{$divisions->nomD}}</p>
                        <div class="profile-stats">
                            <span class="stat-item">
                                <i class="fas fa-calendar-alt"></i>
                                Embauché le {{$employe->hire_date}}
                            </span>
                </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Personal Information -->
                <div class="col-lg-8">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-user-tie"></i>
                            <h3>Informations Personnelles</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-id-card"></i>
                                        CIN
                                    </div>
                                    <div class="info-value">{{$employe->cin}}</div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </div>
                                    <div class="info-value">{{$employe->phone}}</div>
                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Adresse
                    </div>
                                    <div class="info-value">{{$employe->address}}</div>
                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-city"></i>
                                        Ville
                                    </div>
                                    <div class="info-value">{{$employe->city}}</div>
                                </div>
                    </div>
                </div>
                    </div>
                </div>

                <!-- Work Information -->
                <div class="col-lg-4">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-briefcase"></i>
                            <h3>Informations Professionnelles</h3>
                    </div>
                        <div class="card-body-modern">
                            <div class="work-info">
                                <div class="work-item">
                                    <div class="work-icon">
                                        <i class="fas fa-sitemap"></i>
                </div>
                                    <div class="work-details">
                                        <div class="work-label">Division</div>
                                        <div class="work-value">{{$divisions->nomD}}</div>
                    </div>
                </div>

                                <div class="work-item">
                                    <div class="work-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="work-details">
                                        <div class="work-label">Service</div>
                                        <div class="work-value">{{$services->titre}}</div>
                    </div>
                </div>

                                <div class="work-item">
                                    <div class="work-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="work-details">
                                        <div class="work-label">Date d'embauche</div>
                                        <div class="work-value">{{$employe->hire_date}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('employes.edit', $employe->id) }}" class="btn-modern btn-primary">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                <a href="{{ route('employes.index') }}" class="btn-modern btn-secondary">
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
    /* Modern Profile Design */
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 0;
        margin-bottom: 2rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .profile-cover {
        position: relative;
        padding: 3rem 2rem;
        text-align: center;
        color: white;
    }

    .profile-avatar {
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

    .profile-avatar i {
        font-size: 3rem;
        color: white;
    }

    .profile-name {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .profile-title {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0 0 1rem;
    }

    .profile-stats {
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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
        color: #667eea;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: #2d3748;
        word-wrap: break-word;
    }

    /* Work Information */
    .work-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .work-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .work-item:hover {
        transform: translateX(5px);
    }

    .work-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .work-details {
        flex: 1;
    }

    .work-label {
        font-size: 0.8rem;
        color: #4a5568;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .work-value {
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(240, 147, 251, 0.4);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-name {
            font-size: 2rem;
        }

        .profile-title {
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
        .profile-cover {
            padding: 2rem 1rem;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
        }

        .profile-avatar i {
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
