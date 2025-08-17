@extends('adminlte::page')

@section('title', 'Activité Récente')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-history mr-2"></i>
                    Activité Récente
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.profile.show') }}">Profil</a></li>
                    <li class="breadcrumb-item active">Activité</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list mr-2"></i>
                        Historique des Activités
                    </h3>
                </div>
                <div class="card-body">
                    @if($activities->count() > 0)
                        <div class="timeline">
                            @foreach($activities as $activity)
                                <div class="time-label">
                                    <span class="bg-red">{{ $activity->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div>
                                    <i class="fas fa-user bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> {{ $activity->created_at->format('H:i') }}</span>
                                        <h3 class="timeline-header">{{ $activity->description }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Aucune activité récente</h5>
                            <p class="text-muted">Vos activités apparaîtront ici une fois que vous commencerez à utiliser le système.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop
