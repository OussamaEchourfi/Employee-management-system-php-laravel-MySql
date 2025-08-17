@extends('adminlte::page')

@section('title', 'Mon Profil')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-user-circle mr-2"></i>
                    Mon Profil
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Succès!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <!-- Profile Information -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user mr-2"></i>
                        Informations du Profil
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit mr-1"></i>
                            Modifier
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Nom complet:</strong></label>
                                <p class="form-control-static">{{ $user->name ?? 'Non défini' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Téléphone:</strong></label>
                                <p class="form-control-static">{{ $user->phone ?? 'Non défini' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Date d'inscription:</strong></label>
                                <p class="form-control-static">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'Non défini' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Adresse:</strong></label>
                                <p class="form-control-static">{{ $user->address ?? 'Non définie' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Biographie:</strong></label>
                                <p class="form-control-static">{{ $user->bio ?? 'Aucune biographie' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Sécurité
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Dernière connexion:</strong></label>
                                <p class="form-control-static">{{ $user->last_login_at ? $user->last_login_at->format('d/m/Y H:i') : 'Jamais' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Statut du compte:</strong></label>
                                <span class="badge badge-{{ $user->email_verified_at ? 'success' : 'warning' }}">
                                    {{ $user->email_verified_at ? 'Vérifié' : 'Non vérifié' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.profile.change-password') }}" class="btn btn-warning">
                                <i class="fas fa-key mr-1"></i>
                                Changer le mot de passe
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Sidebar -->
        <div class="col-md-4">
            <!-- Profile Picture -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-camera mr-2"></i>
                        Photo de profil
                    </h3>
                </div>
                <div class="card-body text-center">
                    @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" 
                             alt="Photo de profil" 
                             class="img-fluid rounded-circle mb-3"
                             style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="profile-placeholder mb-3">
                            <i class="fas fa-user fa-5x text-muted"></i>
                        </div>
                    @endif
                    
                    <p class="text-muted">Photo de profil</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-2"></i>
                        Actions rapides
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-edit mr-1"></i>
                            Modifier le profil
                        </a>
                        
                        <a href="{{ route('admin.profile.preferences') }}" class="btn btn-info btn-block">
                            <i class="fas fa-cog mr-1"></i>
                            Préférences
                        </a>
                        
                        <a href="{{ route('admin.profile.activity') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-history mr-1"></i>
                            Activité récente
                        </a>
                    </div>
                </div>
            </div>

            <!-- Account Stats -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Statistiques du compte
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-primary">
                                    <i class="fas fa-calendar-check"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jours actif</span>
                                    <span class="info-box-number">
                                        {{ $user->created_at ? $user->created_at->diffInDays(now()) : 0 }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-success">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Dernière activité</span>
                                    <span class="info-box-number">
                                        {{ $user->updated_at ? $user->updated_at->diffForHumans() : 'Jamais' }}
                                    </span>
                                </div>
                            </div>
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
    .profile-placeholder {
        width: 150px;
        height: 150px;
        background: #f8f9fa;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 3px solid #dee2e6;
    }

    .form-control-static {
        padding: 0.375rem 0.75rem;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        min-height: 38px;
        display: flex;
        align-items: center;
    }

    .info-box {
        margin-bottom: 0;
    }

    .info-box-content {
        padding: 0.5rem;
    }

    .info-box-number {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .info-box-text {
        font-size: 0.8rem;
        color: #6c757d;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
@stop
