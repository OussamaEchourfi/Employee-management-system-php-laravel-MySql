@extends('adminlte::page')

@section('title', 'Préférences Utilisateur')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-cog mr-2"></i>
                    Préférences Utilisateur
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.profile.show') }}">Profil</a></li>
                    <li class="breadcrumb-item active">Préférences</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-cog mr-2"></i>
                        Paramètres Personnalisés
                    </h3>
                </div>
                <form action="{{ route('admin.profile.update-preferences') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="language">Langue</label>
                            <select class="form-control" id="language" name="language">
                                <option value="fr" {{ ($user->preferences['language'] ?? 'fr') == 'fr' ? 'selected' : '' }}>Français</option>
                                <option value="en" {{ ($user->preferences['language'] ?? 'fr') == 'en' ? 'selected' : '' }}>English</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="timezone">Fuseau horaire</label>
                            <select class="form-control" id="timezone" name="timezone">
                                <option value="Europe/Paris" {{ ($user->preferences['timezone'] ?? 'Europe/Paris') == 'Europe/Paris' ? 'selected' : '' }}>Europe/Paris</option>
                                <option value="UTC" {{ ($user->preferences['timezone'] ?? 'Europe/Paris') == 'UTC' ? 'selected' : '' }}>UTC</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="theme">Thème</label>
                            <select class="form-control" id="theme" name="theme">
                                <option value="light" {{ ($user->preferences['theme'] ?? 'light') == 'light' ? 'selected' : '' }}>Clair</option>
                                <option value="dark" {{ ($user->preferences['theme'] ?? 'light') == 'dark' ? 'selected' : '' }}>Sombre</option>
                                <option value="auto" {{ ($user->preferences['theme'] ?? 'light') == 'auto' ? 'selected' : '' }}>Automatique</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="notifications_email" name="notifications_email" value="1" {{ ($user->preferences['notifications_email'] ?? true) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="notifications_email">Notifications par email</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="notifications_sms" name="notifications_sms" value="1" {{ ($user->preferences['notifications_sms'] ?? false) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="notifications_sms">Notifications par SMS</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.profile.show') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Retour
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i>
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
