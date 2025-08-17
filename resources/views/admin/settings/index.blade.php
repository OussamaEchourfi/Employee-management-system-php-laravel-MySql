@extends('adminlte::page')

@section('title', 'Paramètres du Système')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-cogs mr-2"></i>
                    Paramètres du Système
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="breadcrumb-item active">Paramètres</li>
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

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Erreur!</h5>
            {{ session('error') }}
        </div>
    @endif

    <!-- Settings Overview -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-2"></i>
                        Vue d'ensemble des paramètres
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Gérez tous les paramètres de votre système depuis cette interface centralisée. 
                        Cliquez sur une section pour modifier les paramètres correspondants.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Categories -->
    <div class="row">
        <!-- General Settings -->
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-primary">
                <span class="info-box-icon">
                    <i class="fas fa-globe"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Paramètres Généraux</span>
                    <span class="info-box-number">{{ $systemSettings['general']['site_name'] ?? 'OG Manage' }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('admin.settings.general') }}" class="text-white">
                            <i class="fas fa-edit mr-1"></i>Modifier
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Email Settings -->
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon">
                    <i class="fas fa-envelope"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Configuration Email</span>
                    <span class="info-box-number">{{ $systemSettings['email']['mail_driver'] ?? 'SMTP' }}</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('admin.settings.email') }}" class="text-white">
                            <i class="fas fa-edit mr-1"></i>Modifier
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon">
                    <i class="fas fa-shield-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Sécurité</span>
                    <span class="info-box-number">{{ $systemSettings['security']['password_min_length'] ?? 8 }} caractères</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('admin.settings.security') }}" class="text-white">
                            <i class="fas fa-edit mr-1"></i>Modifier
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Backup Settings -->
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon">
                    <i class="fas fa-database"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Sauvegarde</span>
                    <span class="info-box-number">
                        @if($systemSettings['backup']['last_backup'])
                            {{ $systemSettings['backup']['last_backup']->diffForHumans() }}
                        @else
                            Jamais
                        @endif
                    </span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('admin.settings.backup') }}" class="text-white">
                            <i class="fas fa-edit mr-1"></i>Gérer
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt mr-2"></i>
                        Actions Rapides
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('admin.settings.general') }}" class="btn btn-primary btn-block mb-3">
                                <i class="fas fa-globe mr-2"></i>
                                Paramètres Généraux
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.settings.email') }}" class="btn btn-success btn-block mb-3">
                                <i class="fas fa-envelope mr-2"></i>
                                Configuration Email
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.settings.security') }}" class="btn btn-warning btn-block mb-3">
                                <i class="fas fa-shield-alt mr-2"></i>
                                Sécurité
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.settings.backup') }}" class="btn btn-info btn-block mb-3">
                                <i class="fas fa-database mr-2"></i>
                                Sauvegarde
                            </a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('admin.settings.system') }}" class="btn btn-secondary btn-block mb-3">
                                <i class="fas fa-server mr-2"></i>
                                Informations Système
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.profile.preferences') }}" class="btn btn-dark btn-block mb-3">
                                <i class="fas fa-user-cog mr-2"></i>
                                Préférences Utilisateur
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-block mb-3" data-toggle="modal" data-target="#maintenanceModal">
                                <i class="fas fa-tools mr-2"></i>
                                Mode Maintenance
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-heartbeat mr-2"></i>
                        État du Système
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-success">
                                    <i class="fas fa-check"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Statut</span>
                                    <span class="info-box-number">Opérationnel</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-info">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Uptime</span>
                                    <span class="info-box-number">{{ now()->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-2"></i>
                        Statistiques
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-warning">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Utilisateurs</span>
                                    <span class="info-box-number">{{ \App\Models\User::count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-primary">
                                    <i class="fas fa-calendar"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Date</span>
                                    <span class="info-box-number">{{ now()->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Maintenance Mode Modal -->
<div class="modal fade" id="maintenanceModal" tabindex="-1" role="dialog" aria-labelledby="maintenanceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="maintenanceModalLabel">
                    <i class="fas fa-tools mr-2"></i>
                    Mode Maintenance
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir activer le mode maintenance ?</p>
                <p class="text-warning">
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    <strong>Attention:</strong> Cela rendra le site inaccessible aux utilisateurs.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger">
                    <i class="fas fa-tools mr-1"></i>
                    Activer le mode maintenance
                </button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .info-box {
        margin-bottom: 1rem;
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

    .progress-description a {
        text-decoration: none;
    }

    .progress-description a:hover {
        text-decoration: underline;
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

        // Add click effects to info boxes
        $('.info-box').click(function() {
            $(this).addClass('shadow-sm');
            setTimeout(() => {
                $(this).removeClass('shadow-sm');
            }, 200);
        });
    });
</script>
@stop
