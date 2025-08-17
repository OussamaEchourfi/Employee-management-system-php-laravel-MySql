@extends('adminlte::page')

@section('title', 'Employes Management System | Détails de l\'Attestation')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Certificate Header -->
            <div class="certificate-header mb-4">
                <div class="certificate-cover">
                    <div class="certificate-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="certificate-info">
                        <h1 class="certificate-title">Attestation de Travail</h1>
                        <p class="certificate-subtitle">
                            @if($attestation->employe)
                                {{ $attestation->employe->nomComplet }}
                            @else
                                Employé non trouvé
                            @endif
                        </p>
                        <div class="certificate-status">
                            <span class="status-badge status-valid">
                                <i class="fas fa-check-circle"></i>
                                Valide
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Employee Information -->
                <div class="col-lg-8">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-user-tie"></i>
                            <h3>Informations de l'Employé</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user"></i>
                                        Nom et Prénom
                                    </div>
                                    <div class="info-value">
                                        @if($attestation->employe)
                                            {{ $attestation->employe->nomComplet }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-id-card"></i>
                                        CIN
                                    </div>
                                    <div class="info-value">
                                        @if($attestation->employe)
                                            {{ $attestation->employe->cin }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </div>
                                    <div class="info-value">
                                        @if($attestation->employe)
                                            {{ $attestation->employe->phone }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-sitemap"></i>
                                        Division
                                    </div>
                                    <div class="info-value">
                                        @if($attestation->employe && $attestation->employe->service && $attestation->employe->service->division)
                                            {{ $attestation->employe->service->division->nomD }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-cogs"></i>
                                        Service
                                    </div>
                                    <div class="info-value">
                                        @if($attestation->employe && $attestation->employe->service)
                                            {{ $attestation->employe->service->titre }}
                                        @else
                                            <span class="text-muted">Non disponible</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="col-lg-4">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-file-alt"></i>
                            <h3>Détails de l'Attestation</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="certificate-details">
                                <div class="certificate-item">
                                    <div class="certificate-icon-small">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="certificate-details-content">
                                        <div class="certificate-label">Date de création</div>
                                        <div class="certificate-value">{{ $attestation->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>

                                <div class="certificate-item">
                                    <div class="certificate-icon-small">
                                        <i class="fas fa-stamp"></i>
                                    </div>
                                    <div class="certificate-details-content">
                                        <div class="certificate-label">Statut</div>
                                        <div class="certificate-value">Approuvée</div>
                                    </div>
                                </div>

                                <div class="certificate-item">
                                    <div class="certificate-icon-small">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="certificate-details-content">
                                        <div class="certificate-label">Entreprise</div>
                                        <div class="certificate-value">OG Communication</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificate Preview -->
            <div class="row">
                <div class="col-12">
                    <div class="info-card">
                        <div class="card-header-modern">
                            <i class="fas fa-eye"></i>
                            <h3>Aperçu de l'Attestation</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="certificate-preview">
                                <div class="certificate-content">
                                    <div class="certificate-header-preview">
                                        <h2>ATTESTATION DE TRAVAIL</h2>
                                        <p class="certificate-number">N° {{ strtoupper(uniqid()) }}</p>
                                    </div>
                                    
                                    <div class="certificate-body-preview">
                                        <p>Nous soussignés, Direction des Ressources Humaines de <strong>OG Communication</strong>, certifions que :</p>
                                        
                                        <div class="employee-details-preview">
                                            <p><strong>Nom et Prénom :</strong> 
                                                @if($attestation->employe)
                                                    {{ $attestation->employe->nomComplet }}
                                                @else
                                                    <span class="text-muted">Non disponible</span>
                                                @endif
                                            </p>
                                            <p><strong>CIN :</strong> 
                                                @if($attestation->employe)
                                                    {{ $attestation->employe->cin }}
                                                @else
                                                    <span class="text-muted">Non disponible</span>
                                                @endif
                                            </p>
                                            <p><strong>Téléphone :</strong> 
                                                @if($attestation->employe)
                                                    {{ $attestation->employe->phone }}
                                                @else
                                                    <span class="text-muted">Non disponible</span>
                                                @endif
                                            </p>
                                            <p><strong>Division :</strong> 
                                                @if($attestation->employe && $attestation->employe->service && $attestation->employe->service->division)
                                                    {{ $attestation->employe->service->division->nomD }}
                                                @else
                                                    <span class="text-muted">Non disponible</span>
                                                @endif
                                            </p>
                                            <p><strong>Service :</strong> 
                                                @if($attestation->employe && $attestation->employe->service)
                                                    {{ $attestation->employe->service->titre }}
                                                @else
                                                    <span class="text-muted">Non disponible</span>
                                                @endif
                                            </p>
                                        </div>
                                        
                                        <p>Est employé(e) dans notre entreprise et travaille actuellement dans le service mentionné ci-dessus.</p>
                                        
                                        <p>Cette attestation est délivrée pour faire valoir ce que de droit.</p>
                                    </div>

                                    <div class="certificate-footer-preview">
                                        <div class="certificate-date">
                                            <p>Fait à Marrakech, le {{ $attestation->created_at->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="certificate-signature">
                                            <p>Signature et cachet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('attestations.certificate', $attestation->id) }}" class="btn-modern btn-primary">
                    <i class="fas fa-print"></i>
                    Imprimer
                </a>
                <a href="{{ route('attestations.edit', $attestation->id) }}" class="btn-modern btn-warning">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                <a href="{{ route('attestations.index') }}" class="btn-modern btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    /* Modern Certificate Design */
    .certificate-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 0;
        margin-bottom: 2rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .certificate-cover {
        position: relative;
        padding: 3rem 2rem;
        text-align: center;
        color: white;
    }

    .certificate-icon {
        width: 120px;
        height: 120px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 4px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(10px);
    }

    .certificate-icon i {
        font-size: 3rem;
        color: white;
    }

    .certificate-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .certificate-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0 0 1rem;
    }

    .certificate-status {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .status-badge {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
    }

    .status-valid {
        background: rgba(40, 167, 69, 0.3);
        color: #155724;
        border: 1px solid rgba(40, 167, 69, 0.5);
    }

    /* Modern Cards */
    .info-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .card-header-modern i {
        font-size: 1.5rem;
    }

    .card-header-modern h3 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 600;
    }

    .card-body-modern {
        padding: 2rem;
    }

    /* Information Grid */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .info-item {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        padding: 1.5rem;
        transition: transform 0.3s ease;
    }

    .info-item:hover {
        transform: translateY(-3px);
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-label i {
        color: #667eea;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: #2d3748;
        word-wrap: break-word;
    }

    .text-muted {
        color: #718096 !important;
        font-style: italic;
    }

    /* Certificate Details */
    .certificate-details {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .certificate-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .certificate-item:hover {
        transform: translateX(5px);
    }

    .certificate-icon-small {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .certificate-details-content {
        flex: 1;
    }

    .certificate-label {
        font-size: 0.8rem;
        color: #4a5568;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .certificate-value {
        font-size: 1rem;
        font-weight: 600;
        color: #2d3748;
    }

    /* Certificate Preview */
    .certificate-preview {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 2rem;
        border: 2px solid #dee2e6;
    }

    .certificate-content {
        background: white;
        padding: 3rem;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        position: relative;
    }

    .certificate-header-preview {
        text-align: center;
        margin-bottom: 2rem;
        border-bottom: 2px solid #667eea;
        padding-bottom: 1rem;
    }

    .certificate-header-preview h2 {
        color: #667eea;
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .certificate-number {
        color: #6c757d;
        font-size: 1rem;
        margin: 0;
    }

    .certificate-body-preview {
        margin-bottom: 2rem;
        line-height: 1.8;
    }

    .certificate-body-preview p {
        margin-bottom: 1rem;
        font-size: 1.1rem;
        color: #2d3748;
    }

    .employee-details-preview {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        margin: 1.5rem 0;
        border-left: 4px solid #667eea;
    }

    .employee-details-preview p {
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .certificate-footer-preview {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #dee2e6;
    }

    .certificate-date p {
        margin: 0;
        font-size: 1rem;
        color: #6c757d;
    }

    .certificate-signature p {
        margin: 0;
        font-size: 1rem;
        color: #6c757d;
        text-align: center;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

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

    .btn-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(245, 158, 11, 0.4);
        color: white;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(108, 117, 125, 0.4);
        color: white;
    }

    /* Print Styles */
    @media print {
        .action-buttons,
        .certificate-header,
        .card-header-modern {
            display: none !important;
        }
        
        .certificate-content {
            box-shadow: none;
            border: 1px solid #000;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .certificate-title {
            font-size: 2rem;
        }

        .certificate-subtitle {
            font-size: 1rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-modern {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }

        .certificate-content {
            padding: 1.5rem;
        }

        .certificate-footer-preview {
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }
    }

    @media (max-width: 576px) {
        .certificate-cover {
            padding: 2rem 1rem;
        }

        .certificate-icon {
            width: 100px;
            height: 100px;
        }

        .certificate-icon i {
            font-size: 2.5rem;
        }

        .card-header-modern {
            padding: 1rem;
        }

        .card-body-modern {
            padding: 1.5rem;
        }
    }
</style>
@endsection