<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Demande de Congé - {{ $employe->nomComplet }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: none;
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
        }
        
        .form-header::before {
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
            position: relative;
            z-index: 1;
        }
        
        .form-header h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }
        
        .form-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
            position: relative;
            z-index: 1;
        }
        
        .form-body {
            padding: 3rem 2rem;
        }
        
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
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-2px);
        }
        
        .form-text {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 0.5rem;
            font-style: italic;
        }
        
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #dc3545;
            font-weight: 500;
        }
        
        .form-actions {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 2rem;
            border: 1px solid #e9ecef;
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
        
        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border-color: #28a745;
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
        
        @media (max-width: 768px) {
            .form-header {
                padding: 2rem 1rem;
            }
            
            .form-body {
                padding: 2rem 1rem;
            }
            
            .form-section {
                padding: 1.5rem;
            }
            
            .form-actions {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('employe.conges.index') }}">
                <div class="me-3">
                    <i class="fas fa-arrow-left fa-lg"></i>
                </div>
                <div>
                    <span class="fw-bold">Retour aux Demandes</span>
                </div>
            </a>
            
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        {{ $employe->nomComplet }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('employe.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>Tableau de Bord
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('employe.profile') }}">
                            <i class="fas fa-user me-2"></i>Mon Profil
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('employe.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="form-header">
                        <div class="form-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <h3>Nouvelle Demande de Congé</h3>
                        <p>Remplissez le formulaire pour soumettre votre demande</p>
                    </div>
                    
                    <div class="form-body">
                        <form action="{{ route('employe.conges.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            
                            <!-- Type de congé -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    Type de Congé
                                </h5>
                                
                                <div class="form-group mb-4">
                                    <label for="droitConge" class="form-label">
                                        <i class="fas fa-tag me-1"></i>
                                        Type de congé <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('droitConge') is-invalid @enderror" 
                                            id="droitConge" name="droitConge" required>
                                        <option value="">📋 Sélectionnez le type de congé</option>
                                        <option value="Congé annuel" {{ old('droitConge') == 'Congé annuel' ? 'selected' : '' }}>
                                            🏖️ Congé annuel
                                        </option>
                                        <option value="Congé maladie" {{ old('droitConge') == 'Congé maladie' ? 'selected' : '' }}>
                                            🏥 Congé maladie
                                        </option>
                                        <option value="Congé maternité" {{ old('droitConge') == 'Congé maternité' ? 'selected' : '' }}>
                                            👶 Congé maternité
                                        </option>
                                        <option value="Congé paternité" {{ old('droitConge') == 'Congé paternité' ? 'selected' : '' }}>
                                            👨‍👩‍👧‍👦 Congé paternité
                                        </option>
                                        <option value="Congé formation" {{ old('droitConge') == 'Congé formation' ? 'selected' : '' }}>
                                            📚 Congé formation
                                        </option>
                                        <option value="Congé sans solde" {{ old('droitConge') == 'Congé sans solde' ? 'selected' : '' }}>
                                            💰 Congé sans solde
                                        </option>
                                        <option value="Autre" {{ old('droitConge') == 'Autre' ? 'selected' : '' }}>
                                            🔧 Autre
                                        </option>
                                    </select>
                                    @error('droitConge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Choisissez le type de congé qui correspond à votre situation
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dates et durée -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-calendar text-warning me-2"></i>
                                    Période de Congé
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="dataDepart" class="form-label">
                                                <i class="fas fa-plane-departure me-1"></i>
                                                Date de départ <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control @error('dataDepart') is-invalid @enderror" 
                                                   id="dataDepart" name="dataDepart" value="{{ old('dataDepart') }}" 
                                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                            @error('dataDepart')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">
                                                <i class="fas fa-clock me-1"></i>
                                                La date doit être au moins demain
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="dateRetour" class="form-label">
                                                <i class="fas fa-plane-arrival me-1"></i>
                                                Date de retour <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control @error('dateRetour') is-invalid @enderror" 
                                                   id="dateRetour" name="dateRetour" value="{{ old('dateRetour') }}" 
                                                   min="{{ date('Y-m-d', strtotime('+2 days')) }}" required>
                                            @error('dateRetour')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">
                                                <i class="fas fa-calendar-check me-1"></i>
                                                La date de retour doit être après la date de départ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="duree" class="form-label">
                                        <i class="fas fa-clock me-1"></i>
                                        Durée estimée (en jours) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control @error('duree') is-invalid @enderror" 
                                           id="duree" name="duree" value="{{ old('duree') }}" 
                                           min="1" max="365" required>
                                    @error('duree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        La durée sera automatiquement calculée selon les dates sélectionnées
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Motif -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-comment text-info me-2"></i>
                                    Justification
                                </h5>
                                
                                <div class="form-group mb-4">
                                    <label for="motif" class="form-label">
                                        <i class="fas fa-edit me-1"></i>
                                        Motif du congé <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control @error('motif') is-invalid @enderror" 
                                              id="motif" name="motif" rows="5" 
                                              placeholder="Décrivez en détail le motif de votre demande de congé..." required>{{ old('motif') }}</textarea>
                                    @error('motif')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Soyez précis et détaillé pour faciliter l'évaluation de votre demande
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
                                        <a href="{{ route('employe.conges.index') }}" class="btn btn-outline-secondary me-3">
                                            <i class="fas fa-times me-2"></i>
                                            Annuler
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-paper-plane me-2"></i>
                                            Soumettre la Demande
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Calculer automatiquement la durée
        document.getElementById('dataDepart').addEventListener('change', calculateDuration);
        document.getElementById('dateRetour').addEventListener('change', calculateDuration);
        
        function calculateDuration() {
            const dateDepart = document.getElementById('dataDepart').value;
            const dateRetour = document.getElementById('dateRetour').value;
            
            if (dateDepart && dateRetour) {
                const start = new Date(dateDepart);
                const end = new Date(dateRetour);
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                
                document.getElementById('duree').value = diffDays;
            }
        }
    </script>
</body>
</html>
