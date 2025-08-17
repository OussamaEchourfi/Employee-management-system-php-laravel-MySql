@extends('adminlte::page')

@section('title', 'Gestion des Tâches')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-tasks text-primary me-3"></i>
                Gestion des Tâches
            </h1>
            <p class="page-subtitle text-muted">
                Gérez et suivez toutes les tâches assignées aux employés
            </p>
        </div>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-plus me-2"></i>
            Nouvelle Tâche
        </a>
    </div>
@stop

@section('content')
<div class="container-fluid">

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-primary">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->count() }}</h3>
                        <p class="stat-card-label">Total des Tâches</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-warning">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('status', 'pending')->count() }}</h3>
                        <p class="stat-card-label">En Attente</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('status', 'pending')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-info">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('status', 'in_progress')->count() }}</h3>
                        <p class="stat-card-label">En Cours</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('status', 'in_progress')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-success">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('status', 'completed')->count() }}</h3>
                        <p class="stat-card-label">Terminées</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('status', 'completed')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Priority Statistics -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-danger">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('priority', 'urgent')->count() }}</h3>
                        <p class="stat-card-label">Urgentes</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('priority', 'urgent')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-warning">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('priority', 'high')->count() }}</h3>
                        <p class="stat-card-label">Élevées</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('priority', 'high')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-info">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('priority', 'medium')->count() }}</h3>
                        <p class="stat-card-label">Moyennes</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('priority', 'medium')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-secondary">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ $tasks->where('priority', 'low')->count() }}</h3>
                        <p class="stat-card-label">Faibles</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: {{ $tasks->count() > 0 ? ($tasks->where('priority', 'low')->count() / $tasks->count()) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="content-card">
                <div class="content-card-header">
                    <h3 class="content-card-title">
                        <i class="fas fa-list me-2"></i>
                        Liste des Tâches
                    </h3>
                    <div class="content-card-actions">
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control search-input" placeholder="Rechercher une tâche...">
                        </div>
                    </div>
                </div>
                <div class="content-card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($tasks->count() > 0)
                        <div class="table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="table-header">
                                            <i class="fas fa-hashtag me-1"></i>ID
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-tasks me-1"></i>Tâche
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-user me-1"></i>Employé
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-flag me-1"></i>Priorité
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-info-circle me-1"></i>Statut
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-calendar me-1"></i>Date Limite
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-user-shield me-1"></i>Assignée par
                                        </th>
                                        <th class="table-header">
                                            <i class="fas fa-cogs me-1"></i>Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr class="table-row @if($task->due_date < now() && $task->status !== 'completed') overdue-row @endif">
                                            <td>
                                                <span class="task-id">{{ $task->id }}</span>
                                            </td>
                                            <td>
                                                <div class="task-info">
                                                    <h6 class="task-title">{{ $task->title }}</h6>
                                                    <p class="task-description">{{ Str::limit($task->description, 60) }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="employee-info">
                                                    <div class="employee-avatar">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                    <div class="employee-details">
                                                        <span class="employee-name">{{ $task->employe->nomComplet }}</span>
                                                        <span class="employee-service">{{ $task->employe->service->titre ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @switch($task->priority)
                                                    @case('low')
                                                        <span class="priority-badge priority-low">
                                                            <i class="fas fa-arrow-down me-1"></i>Faible
                                                        </span>
                                                        @break
                                                    @case('medium')
                                                        <span class="priority-badge priority-medium">
                                                            <i class="fas fa-minus me-1"></i>Moyenne
                                                        </span>
                                                        @break
                                                    @case('high')
                                                        <span class="priority-badge priority-high">
                                                            <i class="fas fa-arrow-up me-1"></i>Élevée
                                                        </span>
                                                        @break
                                                    @case('urgent')
                                                        <span class="priority-badge priority-urgent">
                                                            <i class="fas fa-exclamation-triangle me-1"></i>Urgente
                                                        </span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>
                                                @switch($task->status)
                                                    @case('pending')
                                                        <span class="status-badge status-pending">
                                                            <i class="fas fa-clock me-1"></i>En attente
                                                        </span>
                                                        @break
                                                    @case('in_progress')
                                                        <span class="status-badge status-progress">
                                                            <i class="fas fa-spinner me-1"></i>En cours
                                                        </span>
                                                        @break
                                                    @case('completed')
                                                        <span class="status-badge status-completed">
                                                            <i class="fas fa-check me-1"></i>Terminée
                                                        </span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <div class="due-date @if($task->due_date < now() && $task->status !== 'completed') overdue @endif">
                                                    <span class="date">{{ $task->due_date->format('d/m/Y') }}</span>
                                                    @if($task->due_date < now() && $task->status !== 'completed')
                                                        <span class="overdue-label">En retard</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="assignee-info">
                                                    <div class="assignee-avatar">
                                                        <i class="fas fa-user-shield"></i>
                                                    </div>
                                                    <div class="assignee-details">
                                                        <span class="assignee-name">{{ $task->assignedBy->name ?? 'N/A' }}</span>
                                                        <span class="assignee-role">Admin</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-action btn-view" title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-action btn-edit" title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-action btn-delete" title="Supprimer">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <h5 class="empty-title">Aucune tâche trouvée</h5>
                            <p class="empty-description">Commencez par créer votre première tâche pour organiser le travail de vos employés.</p>
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-plus me-2"></i>
                                Créer une Tâche
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Page Header - AdminLTE compatible */
.content-header .page-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: #2c3e50;
}

.content-header .page-subtitle {
    font-size: 1.1rem;
    color: #6c757d;
    margin-bottom: 0;
}

/* Statistics Cards */
.stat-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: none;
    overflow: hidden;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.stat-card-body {
    padding: 2rem;
    display: flex;
    align-items: center;
}

.stat-card-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin-right: 1.5rem;
}

.stat-card-primary .stat-card-icon { background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); }
.stat-card-warning .stat-card-icon { background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); }
.stat-card-info .stat-card-icon { background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); }
.stat-card-success .stat-card-icon { background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); }
.stat-card-danger .stat-card-icon { background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); }
.stat-card-secondary .stat-card-icon { background: linear-gradient(135deg, #6c757d 0%, #545b62 100%); }

.stat-card-content {
    flex: 1;
}

.stat-card-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-card-label {
    color: #6c757d;
    font-size: 1rem;
    margin-bottom: 1rem;
    font-weight: 500;
}

.stat-card-progress {
    background: #e9ecef;
    border-radius: 10px;
    height: 8px;
    overflow: hidden;
}

.stat-card-progress .progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 10px;
    transition: width 0.6s ease;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
    overflow: hidden;
}

.content-card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.content-card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
}

.content-card-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-box {
    position: relative;
    width: 300px;
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
}

.search-input {
    padding-left: 2.5rem;
    border-radius: 25px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.content-card-body {
    padding: 2rem;
}

/* Table Styles */
.table-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.table {
    margin-bottom: 0;
}

.table-header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: none;
    padding: 1rem;
    font-size: 0.9rem;
}

.table-row {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f8f9fa;
}

.table-row:hover {
    background-color: rgba(102, 126, 234, 0.05);
    transform: scale(1.01);
}

.overdue-row {
    background-color: rgba(220, 53, 69, 0.05);
    border-left: 4px solid #dc3545;
}

.table td {
    padding: 1.5rem 1rem;
    vertical-align: middle;
    border-top: none;
}

/* Task Info */
.task-id {
    background: #f8f9fa;
    color: #6c757d;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
}

.task-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 1rem;
}

.task-description {
    color: #6c757d;
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.4;
}

/* Employee Info */
.employee-info, .assignee-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.employee-avatar, .assignee-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
}

.employee-details, .assignee-details {
    display: flex;
    flex-direction: column;
}

.employee-name, .assignee-name {
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.9rem;
}

.employee-service, .assignee-role {
    color: #6c757d;
    font-size: 0.8rem;
}

/* Priority Badges */
.priority-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
}

.priority-low { background: #6c757d; color: white; }
.priority-medium { background: #17a2b8; color: white; }
.priority-high { background: #ffc107; color: #212529; }
.priority-urgent { background: #dc3545; color: white; }

/* Status Badges */
.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
}

.status-pending { background: #ffc107; color: #212529; }
.status-progress { background: #17a2b8; color: white; }
.status-completed { background: #28a745; color: white; }

/* Due Date */
.due-date {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.due-date .date {
    font-weight: 600;
    color: #2c3e50;
}

.due-date.overdue .date {
    color: #dc3545;
}

.overdue-label {
    background: #dc3545;
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 10px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-action {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.btn-view {
    background: #17a2b8;
    color: white;
}

.btn-edit {
    background: #ffc107;
    color: #212529;
}

.btn-delete {
    background: #dc3545;
    color: white;
}

.btn-action:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    font-size: 5rem;
    color: #6c757d;
    margin-bottom: 1.5rem;
    opacity: 0.5;
}

.empty-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.empty-description {
    color: #6c757d;
    font-size: 1.1rem;
    margin-bottom: 2rem;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Responsive */
@media (max-width: 768px) {
    .content-header .page-title {
        font-size: 2rem;
    }
    
    .content-card-header {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
    
    .search-box {
        width: 100%;
    }
    
    .table-container {
        overflow-x: auto;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.25rem;
    }
}
</style>
@endsection


