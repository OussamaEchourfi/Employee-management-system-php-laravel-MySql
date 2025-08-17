@extends('adminlte::page')

@section('title', 'Détails de la Tâche')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-eye text-info me-3"></i>
                Détails de la Tâche
            </h1>
            <p class="page-subtitle text-muted">
                Consultez et gérez les informations de la tâche
            </p>
        </div>
        <div class="action-buttons-header">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-lg me-3">
                <i class="fas fa-edit me-2"></i>
                Modifier
            </a>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-arrow-left me-2"></i>
                Retour à la Liste
            </a>
        </div>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Task Overview Card -->
            <div class="task-overview-card">
                <div class="task-overview-header">
                    <div class="task-status-indicator {{ $task->status }}">
                        <i class="fas fa-{{ $task->status == 'pending' ? 'clock' : ($task->status == 'in_progress' ? 'spinner' : 'check') }}"></i>
                    </div>
                    <div class="task-main-info">
                        <h2 class="task-title">{{ $task->title }}</h2>
                        <div class="task-meta">
                            <span class="task-id">#{{ $task->id }}</span>
                            <span class="task-priority priority-{{ $task->priority }}">
                                <i class="fas fa-flag me-1"></i>
                                {{ ucfirst($task->priority) }}
                            </span>
                            <span class="task-status status-{{ $task->status }}">
                                <i class="fas fa-{{ $task->status == 'pending' ? 'clock' : ($task->status == 'in_progress' ? 'spinner' : 'check') }} me-1"></i>
                                {{ $task->status == 'pending' ? 'En attente' : ($task->status == 'in_progress' ? 'En cours' : 'Terminée') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Colonne principale -->
                <div class="col-lg-8">
                    <!-- Description Section -->
                    <div class="task-section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-align-left text-primary me-2"></i>
                                Description
                            </h5>
                        </div>
                        <div class="section-content">
                            <div class="description-content">
                                {{ $task->description }}
                            </div>
                        </div>
                    </div>

                    <!-- Status Update Section -->
                    <div class="task-section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-sync-alt text-warning me-2"></i>
                                Mettre à jour le statut
                            </h5>
                        </div>
                        <div class="section-content">
                            <form action="{{ route('tasks.update-status', $task->id) }}" method="POST" class="status-update-form">
                                @csrf
                                @method('PATCH')
                                <div class="row align-items-end">
                                    <div class="col-md-8">
                                        <label for="status" class="form-label">Nouveau statut</label>
                                        <select name="status" class="form-select form-select-lg" required>
                                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                                                ⏳ En attente
                                            </option>
                                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                                                🔄 En cours
                                            </option>
                                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                                                ✅ Terminée
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            <i class="fas fa-save me-2"></i>
                                            Mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Colonne latérale -->
                <div class="col-lg-4">
                    <!-- Employee Info -->
                    <div class="task-section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-user-tie text-success me-2"></i>
                                Employé assigné
                            </h5>
                        </div>
                        <div class="section-content">
                            <div class="employee-card">
                                <div class="employee-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="employee-details">
                                    <h6 class="employee-name">{{ $task->employe->nomComplet }}</h6>
                                    <span class="employee-service">{{ $task->employe->service->titre ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Task Details -->
                    <div class="task-section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-info-circle text-info me-2"></i>
                                Détails de la tâche
                            </h5>
                        </div>
                        <div class="section-content">
                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    Date limite
                                </span>
                                <span class="detail-value {{ $task->due_date < now() && $task->status !== 'completed' ? 'overdue' : '' }}">
                                    {{ $task->due_date->format('d/m/Y') }}
                                    @if($task->due_date < now() && $task->status !== 'completed')
                                        <span class="overdue-badge">En retard</span>
                                    @endif
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-user-shield me-2"></i>
                                    Assignée par
                                </span>
                                <span class="detail-value">{{ $task->assignedBy->name ?? 'N/A' }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">
                                    <i class="fas fa-clock me-2"></i>
                                    Créée le
                                </span>
                                <span class="detail-value">{{ $task->created_at->format('d/m/Y à H:i') }}</span>
                            </div>

                            @if($task->completed_at)
                                <div class="detail-item completed">
                                    <span class="detail-label">
                                        <i class="fas fa-check-circle me-2"></i>
                                        Terminée le
                                    </span>
                                    <span class="detail-value">{{ $task->completed_at->format('d/m/Y à H:i') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="task-section-card">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="fas fa-bolt text-warning me-2"></i>
                                Actions rapides
                            </h5>
                        </div>
                        <div class="section-content">
                            <div class="quick-actions">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-warning w-100 mb-2">
                                    <i class="fas fa-edit me-2"></i>
                                    Modifier la tâche
                                </a>
                                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-list me-2"></i>
                                    Voir toutes les tâches
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Task Overview Card */
.task-overview-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.task-overview-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 3rem 2rem;
    display: flex;
    align-items: center;
    gap: 2rem;
    position: relative;
}

.task-overview-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.task-status-indicator {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    position: relative;
    z-index: 1;
}

.task-status-indicator.pending { background: rgba(255, 193, 7, 0.3); }
.task-status-indicator.in_progress { background: rgba(23, 162, 184, 0.3); }
.task-status-indicator.completed { background: rgba(40, 167, 69, 0.3); }

.task-main-info {
    flex: 1;
    position: relative;
    z-index: 1;
}

.task-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.task-meta {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.task-id {
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
}

.task-priority, .task-status {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Priority Colors */
.priority-low { background: rgba(108, 117, 125, 0.8); }
.priority-medium { background: rgba(23, 162, 184, 0.8); }
.priority-high { background: rgba(255, 193, 7, 0.8); color: #212529; }
.priority-urgent { background: rgba(220, 53, 69, 0.8); }

/* Status Colors */
.status-pending { background: rgba(255, 193, 7, 0.8); color: #212529; }
.status-in_progress { background: rgba(23, 162, 184, 0.8); }
.status-completed { background: rgba(40, 167, 69, 0.8); }

/* Task Section Cards */
.task-section-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    margin-bottom: 2rem;
    overflow: hidden;
    border: 1px solid #e9ecef;
}

.section-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #dee2e6;
}

.section-title {
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    font-size: 1.3rem;
}

.section-content {
    padding: 2rem;
}

/* Description */
.description-content {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 12px;
    border-left: 4px solid #667eea;
    line-height: 1.8;
    font-size: 1.1rem;
    color: #2c3e50;
}

/* Status Update Form */
.status-update-form {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 12px;
    border: 1px solid #e9ecef;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.75rem;
}

.form-select {
    border-radius: 12px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
}

.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

/* Employee Card */
.employee-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 12px;
    border: 1px solid #e9ecef;
}

.employee-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.employee-details {
    flex: 1;
}

.employee-name {
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.25rem;
    font-size: 1.1rem;
}

.employee-service {
    color: #6c757d;
    font-size: 0.9rem;
    font-style: italic;
}

/* Detail Items */
.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item.completed {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    margin: 0 -1rem;
    padding: 1rem;
    border-radius: 8px;
}

.detail-label {
    color: #6c757d;
    font-weight: 600;
    font-size: 0.9rem;
}

.detail-value {
    font-weight: 700;
    color: #2c3e50;
    text-align: right;
}

.detail-value.overdue {
    color: #dc3545;
}

.overdue-badge {
    background: #dc3545;
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-left: 0.5rem;
}

/* Quick Actions */
.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
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

.btn-outline-warning {
    border-color: #ffc107;
    color: #856404;
}

.btn-outline-warning:hover {
    background: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-outline-secondary {
    border-color: #6c757d;
    color: #6c757d;
}

.btn-outline-secondary:hover {
    background: #6c757d;
    border-color: #6c757d;
    color: white;
}

/* Header Action Buttons */
.action-buttons-header {
    display: flex;
    gap: 1rem;
}

/* Responsive */
@media (max-width: 768px) {
    .task-overview-header {
        flex-direction: column;
        text-align: center;
        padding: 2rem 1rem;
    }
    
    .task-title {
        font-size: 2rem;
    }
    
    .task-meta {
        justify-content: center;
        gap: 1rem;
    }
    
    .action-buttons-header {
        flex-direction: column;
        width: 100%;
        margin-top: 1rem;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .section-content {
        padding: 1.5rem;
    }
    
    .status-update-form .row {
        flex-direction: column;
    }
    
    .status-update-form .col-md-4 {
        margin-top: 1rem;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.task-overview-card {
    animation: fadeInUp 0.6s ease-out;
}

.task-section-card {
    animation: fadeInUp 0.6s ease-out 0.2s both;
}

.task-section-card:nth-child(2) {
    animation-delay: 0.4s;
}

.task-section-card:nth-child(3) {
    animation-delay: 0.6s;
}

.task-section-card:nth-child(4) {
    animation-delay: 0.8s;
}
</style>
@endsection
