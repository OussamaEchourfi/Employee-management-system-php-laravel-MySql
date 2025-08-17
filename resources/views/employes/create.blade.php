@extends('adminlte::page')

@section('title', 'Employes Management System | Créer un Employé')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="header-content">
            <div class="header-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="header-info">
                <h1 class="header-title">Créer un Nouvel Employé</h1>
                <p class="header-subtitle">Ajoutez un nouvel employé à votre équipe</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('employes.index') }}" class="btn-modern btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="content-card">
                <div class="card-header-modern">
                    <div class="header-left">
                        <i class="fas fa-user-edit"></i>
                        <h3>Informations de l'Employé</h3>
                    </div>
                </div>
                <div class="card-body-modern">
                    @include('layouts.alert')
                    
                    <form method="POST" action="{{ route('employes.store') }}" enctype="multipart/form-data" class="modern-form">
                        @csrf

                        <div class="form-sections">
                            <!-- Personal Information -->
                            <div class="form-section">
                                <div class="section-header">
                                    <i class="fas fa-user"></i>
                                    <h4>Informations Personnelles</h4>
                                </div>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-user-circle"></i>
                                            Nom complet
                                        </label>
                            <input type="text" name="nomComplet" 
                                   value="{{ old('nomComplet') }}" 
                                               placeholder="Entrez le nom complet" 
                                               class="form-control-modern" required>
                                        @error('nomComplet')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                        </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-id-card"></i>
                                            CIN
                                        </label>
                            <input type="text" name="cin" 
                                   value="{{ old('cin') }}" 
                                               placeholder="Entrez le CIN" 
                                               class="form-control-modern" required>
                                        @error('cin')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-phone"></i>
                                            Téléphone
                                        </label>
                                        <input type="text" name="phone" 
                                               value="{{ old('phone') }}" 
                                               placeholder="Entrez le numéro de téléphone" 
                                               class="form-control-modern" required>
                                        @error('phone')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                        </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            Date d'embauche
                                        </label>
                            <input type="date" name="hire_date" 
                                   value="{{ old('hire_date') }}" 
                                               class="form-control-modern" required>
                                        @error('hire_date')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        </div>

                            <!-- Address Information -->
                            <div class="form-section">
                                <div class="section-header">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h4>Informations d'Adresse</h4>
                        </div>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-home"></i>
                                            Adresse
                                        </label>
                            <input type="text" name="address" 
                                   value="{{ old('address') }}" 
                                               placeholder="Entrez l'adresse complète" 
                                               class="form-control-modern" required>
                                        @error('address')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                        </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-city"></i>
                                            Ville
                                        </label>
                            <input type="text" name="city" 
                                   value="{{ old('city') }}" 
                                               placeholder="Entrez la ville" 
                                               class="form-control-modern" required>
                                        @error('city')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        </div>

                            <!-- Work Information -->
                            <div class="form-section">
                                <div class="section-header">
                                    <i class="fas fa-briefcase"></i>
                                    <h4>Informations Professionnelles</h4>
                                </div>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-cogs"></i>
                                            Service
                                        </label>
                                        <select class="form-control-modern" name="Idservice" id="Idservice" required>
                                <option value="">Sélectionner un service</option>
                                @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ old('Idservice') == $service->id ? 'selected' : '' }}>
                                                    {{ $service->titre }}
                                                </option>
                                @endforeach
                            </select>
                                        @error('Idservice')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
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
                                Créer l'Employé
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
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
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
        backdrop-filter: blur(10px);
    }

    .header-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .header-info {
        flex: 1;
        margin-left: 2rem;
    }

    .header-title {
        font-size: 2.5rem;
  font-weight: 700;
        margin: 0 0 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .header-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }

    .header-actions {
        margin-left: 2rem;
    }

    /* Content Card */
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

    /* Form Sections */
    .form-sections {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .form-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 1.5rem;
        border: 1px solid #dee2e6;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #667eea;
    }

    .section-header i {
        font-size: 1.5rem;
        color: #667eea;
    }

    .section-header h4 {
        margin: 0;
        color: #2d3748;
        font-weight: 600;
        font-size: 1.2rem;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    /* Form Labels */
    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #4a5568;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-label i {
        color: #667eea;
        font-size: 1rem;
    }

    /* Form Controls */
    .form-control-modern {
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        color: #2d3748;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    .form-control-modern::placeholder {
        color: #a0aec0;
    }

    /* Error Messages */
    .error-message {
        color: #e53e3e;
        font-size: 0.85rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .error-message::before {
        content: "⚠";
        font-size: 1rem;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    /* Modern Buttons */
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
        font-size: 1rem;
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
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .header-info {
            margin-left: 0;
        }

        .header-actions {
            margin-left: 0;
        }

        .header-title {
            font-size: 2rem;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .page-header {
            padding: 1.5rem;
        }

        .header-icon {
            width: 60px;
            height: 60px;
        }

        .header-icon i {
            font-size: 2rem;
        }

        .card-header-modern {
            padding: 1rem;
        }

        .card-body-modern {
            padding: 1.5rem;
        }

        .form-section {
            padding: 1rem;
        }
}
</style>
@stop
