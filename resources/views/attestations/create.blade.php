@extends('adminlte::page')

@section('title', 'Employes Management System | Create')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="header-content">
            <div class="header-icon">
                <i class="fas fa-certificate"></i>
            </div>
            <div class="header-info">
                <h1 class="header-title">Créer Attestation</h1>
                <p class="header-subtitle">Gestion complète des attestations de l'entreprise</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('attestations.index') }}" class="btn-modern btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="row my-3">
                <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="content-card">
                <div class="card-header-modern">
                    <div class="header-left">
                        <i class="fas fa-plus"></i>
                        <h3>Créer l'Attestation</h3>
                    </div>
                </div>
                <div class="card-body-modern">
                    <form method="POST" action="{{ route('attestations.store') }}" enctype="multipart/form-data" class="modern-form">
                        @csrf
                        
                        <div class="form-sections">
                            <!-- Employee Selection -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-user"></i>
                                    Sélection de l'Employé
                                </h4>
                                <div class="form-group">
                                    <label for="employID" class="form-label">Employé *</label>
                                    <select name="employID" id="employID" class="form-select @error('employID') is-invalid @enderror" required>
                                        <option value="">Sélectionner un employé</option>
                                        @foreach($employes as $employe)
                                            <option value="{{ $employe->id }}" {{ old('employID') == $employe->id ? 'selected' : '' }}>
                                                {{ $employe->nomComplet }} - {{ $employe->cin }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('employID')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Attestation Details -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-certificate"></i>
                                    Détails de l'Attestation
                                </h4>
                                <div class="form-group">
                                    <label for="type" class="form-label">Type d'Attestation</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="Attestation de travail" {{ old('type') == 'Attestation de travail' ? 'selected' : '' }}>Attestation de travail</option>
                                        <option value="Attestation de salaire" {{ old('type') == 'Attestation de salaire' ? 'selected' : '' }}>Attestation de salaire</option>
                                        <option value="Attestation de présence" {{ old('type') == 'Attestation de présence' ? 'selected' : '' }}>Attestation de présence</option>
                                        <option value="Autre" {{ old('type') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="form-label">Description (optionnel)</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description de l'attestation...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-modern btn-secondary" onclick="history.back()">
                                <i class="fas fa-times"></i>
                                Annuler
                            </button>
                            <button type="submit" class="btn-modern btn-primary">
                                <i class="fas fa-save"></i>
                                Créer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
/* Page Header */
.page-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
}

.header-icon {
    width: 80px;
    height: 80px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid rgba(255,255,255,0.3);
}

.header-icon i {
    font-size: 2rem;
    color: white;
}

.header-info h1 {
    margin: 0;
    font-size: 2.5rem;
    font-weight: 700;
}

.header-info p {
    margin: 0.5rem 0 0;
    opacity: 0.9;
    font-size: 1.1rem;
}

.btn-modern {
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
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

.btn-secondary {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    color: white;
}

.btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(168, 237, 234, 0.4);
    color: white;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
}

.card-header-modern {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 1.5rem 2rem;
    display: flex;
    align-items: center;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-left i {
    font-size: 1.5rem;
}

.header-left h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.card-body-modern {
    padding: 2rem;
}

/* Form Styles */
.modern-form {
    max-width: 100%;
}

.form-sections {
    margin-bottom: 2rem;
}

.form-section {
    background: #f8fafc;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    border-left: 4px solid #667eea;
}

.section-title {
    color: #667eea;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.section-title i {
    color: #667eea;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    color: #4a5568;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}

.form-control, .form-select {
    border-radius: 10px;
    border: 2px solid #e2e8f0;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    font-weight: 400;
    color: #2d3748;
    background: white;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.form-control.is-invalid, .form-select.is-invalid {
    border-color: #e53e3e;
}

.invalid-feedback {
    color: #e53e3e;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 2rem;
    border-top: 1px solid #e2e8f0;
}

/* Responsive */
@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .header-info h1 {
        font-size: 2rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-modern {
        width: 100%;
        justify-content: center;
    }
}
</style>
@stop
