@extends('adminlte::page')

@section('title', 'Modifier la Tâche')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-edit text-warning me-3"></i>
                Modifier la Tâche
            </h1>
            <p class="page-subtitle text-muted">
                Modifiez les informations de la tâche sélectionnée
            </p>
        </div>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-arrow-left me-2"></i>
            Retour à la Liste
        </a>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="task-form-card">
                <div class="task-form-header edit-header">
                    <div class="form-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3>Modifier la Tâche</h3>
                    <p>Mettez à jour les informations de la tâche</p>
                </div>
                
                <div class="task-form-body">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Colonne principale -->
                            <div class="col-lg-8">
                                <div class="form-section">
                                    <h5 class="section-title">
                                        <i class="fas fa-edit text-primary me-2"></i>
                                        Détails de la Tâche
                                    </h5>
                                    
                                    <div class="form-group mb-4">
                                        <label for="title" class="form-label">
                                            <i class="fas fa-heading me-1"></i>
                                            Titre de la tâche <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $task->title) }}" 
                                               placeholder="Ex: Développer le module de rapport..." required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="description" class="form-label">
                                            <i class="fas fa-align-left me-1"></i>
                                            Description <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="6" 
                                                  placeholder="Décrivez la tâche en détail, incluez les objectifs, les étapes et les résultats attendus..." required>{{ old('description', $task->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Soyez précis et détaillé pour une meilleure compréhension
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Colonne latérale -->
                            <div class="col-lg-4">
                                <div class="form-section">
                                    <h5 class="section-title">
                                        <i class="fas fa-cogs text-warning me-2"></i>
                                        Configuration
                                    </h5>
                                    
                                    <div class="form-group mb-4">
                                        <label for="employe_id" class="form-label">
                                            <i class="fas fa-user-tie me-1"></i>
                                            Employé assigné <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-lg @error('employe_id') is-invalid @enderror" 
                                                id="employe_id" name="employe_id" required>
                                            <option value="">👤 Sélectionnez un employé</option>
                                            @foreach($employes as $employe)
                                                <option value="{{ $employe->id }}" {{ old('employe_id', $task->employe_id) == $employe->id ? 'selected' : '' }}>
                                                    {{ $employe->nomComplet }} - {{ $employe->service->titre ?? 'N/A' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('employe_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="priority" class="form-label">
                                            <i class="fas fa-flag me-1"></i>
                                            Priorité <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-lg @error('priority') is-invalid @enderror" 
                                                id="priority" name="priority" required>
                                            <option value="">🚩 Sélectionnez la priorité</option>
                                            <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>
                                                🟢 Faible - Peut attendre
                                            </option>
                                            <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>
                                                🟡 Moyenne - Normale
                                            </option>
                                            <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>
                                                🟠 Élevée - Important
                                            </option>
                                            <option value="urgent" {{ old('priority', $task->priority) == 'urgent' ? 'selected' : '' }}>
                                                🔴 Urgente - Critique
                                            </option>
                                        </select>
                                        @error('priority')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="status" class="form-label">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Statut <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-lg @error('status') is-invalid @enderror" 
                                                id="status" name="status" required>
                                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                                                ⏳ En attente
                                            </option>
                                            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>
                                                🔄 En cours
                                            </option>
                                            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>
                                                ✅ Terminée
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="due_date" class="form-label">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            Date limite <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control form-control-lg @error('due_date') is-invalid @enderror" 
                                               id="due_date" name="due_date" value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
                                        @error('due_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            <i class="fas fa-clock me-1"></i>
                                            Date limite de la tâche
                                        </div>
                                    </div>

                                    @if($task->completed_at)
                                        <div class="completion-info">
                                            <div class="completion-badge">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                <strong>Terminée le:</strong> {{ $task->completed_at->format('d/m/Y à H:i') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="form-actions">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-info">
                                    <i class="fas fa-shield-alt text-info me-2"></i>
                                    <span class="text-muted">Tous les champs marqués d'un * sont obligatoires</span>
                                </div>
                                <div class="action-buttons">
                                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-lg me-3">
                                        <i class="fas fa-times me-2"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-warning btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Task Form Card */
.task-form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.task-form-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 3rem 2rem;
    text-align: center;
    position: relative;
}

.edit-header {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
}

.task-form-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.form-icon {
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
}

.task-form-header h3 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.task-form-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

.task-form-body {
    padding: 3rem 2rem;
}

/* Form Sections */
.form-section {
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

/* Form Controls */
.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.form-control, .form-select {
    border-radius: 12px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    font-size: 1rem;
    padding: 0.75rem 1rem;
}

.form-control-lg, .form-select-lg {
    padding: 1rem 1.25rem;
    font-size: 1.1rem;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    transform: translateY(-2px);
}

.form-control::placeholder {
    color: #adb5bd;
    font-style: italic;
}

/* Form Text */
.form-text {
    font-size: 0.9rem;
    color: #6c757d;
    margin-top: 0.5rem;
    font-style: italic;
}

/* Invalid Feedback */
.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #dc3545;
    font-weight: 500;
}

/* Completion Info */
.completion-info {
    margin-top: 1rem;
}

.completion-badge {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    padding: 1rem;
    border-radius: 12px;
    border: 1px solid #c3e6cb;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Form Actions */
.form-actions {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 2rem;
    margin-top: 2rem;
    border: 1px solid #e9ecef;
}

.form-info {
    display: flex;
    align-items: center;
    font-size: 0.95rem;
}

.action-buttons {
    display: flex;
    gap: 1rem;
}

/* Buttons */
.btn {
    border-radius: 12px;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.btn-warning {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    border-color: #ffc107;
    color: #212529;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #e0a800 0%, #e8590c 100%);
    border-color: #e0a800;
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

/* Responsive */
@media (max-width: 768px) {
    .task-form-header {
        padding: 2rem 1rem;
    }
    
    .task-form-body {
        padding: 2rem 1rem;
    }
    
    .form-section {
        padding: 1.5rem;
    }
    
    .form-actions {
        padding: 1.5rem;
    }
    
    .action-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .form-info {
        margin-bottom: 1rem;
        justify-content: center;
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

.task-form-card {
    animation: fadeInUp 0.6s ease-out;
}

.form-section {
    animation: fadeInUp 0.6s ease-out 0.2s both;
}

.form-actions {
    animation: fadeInUp 0.6s ease-out 0.4s both;
}

.completion-info {
    animation: fadeInUp 0.6s ease-out 0.6s both;
}
</style>
@endsection
