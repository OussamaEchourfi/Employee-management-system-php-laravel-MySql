@extends('adminlte::page')

@section('title', 'Employes Management System | Attestation')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Print Header -->
            <div class="print-header mb-4">
                <div class="company-logo">
                    <img src="{{ asset('vendor/adminlte/dist/img/og.png') }}" alt="Logo OG Communication" class="logo-img">
                </div>
                <div class="company-info">
                    <h1 class="company-name">OG COMMUNICATION</h1>
                    <p class="document-title">Attestation de travail</p>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="content-card">
                <div class="card-header-modern">
                    <h3><i class="fas fa-file-alt"></i> Contenu de l'Attestation</h3>
                </div>
                <div class="card-body-modern">
                    <div class="attestation-content">
                        <div class="attestation-text">
                            <p class="lead">
                                Nous soussignés société <strong>OG COMMUNICATION</strong> domiciliée à Marrakech attestons par la présente que 
                                <strong>
                                    @if($attestation->employe)
                                        {{ $attestation->employe->nomComplet }}
                                    @else
                                        [Nom de l'employé]
                                    @endif
                                </strong>, 
                                immatriculé à OG COMMUNICATION sous le numéro
                                <strong>{{ $attestation->id }}</strong>, 
                                est employé au sein de notre société en qualité de 
                                <strong>
                                    @if($attestation->employe && $attestation->employe->service)
                                        {{ $attestation->employe->service->titre }}
                                    @else
                                        [Service]
                                    @endif
                                </strong>.
                            </p>
                            
                            <p class="lead">
                                Et ce depuis le 
                                <strong>
                                    @if($attestation->employe)
                                        {{ $attestation->employe->hire_date ? \Carbon\Carbon::parse($attestation->employe->hire_date)->format('d/m/Y') : 'Date non spécifiée' }}
                                    @else
                                        [Date d'embauche]
                                    @endif
                                </strong>.
                            </p>
                            
                            <p class="lead">
                                La présente attestation lui est délivrée à sa demande pour servir et valoir ce que de droit.
                            </p>
                            
                            <div class="attestation-footer">
                                <p class="lead">
                                    Fait à Marrakech, le : <strong>{{ $attestation->created_at->format('d/m/Y') }}</strong>
                                </p>
                                <p class="lead">
                                    Signature et cachet
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button type="button" id="printPageButton" class="btn-modern btn-primary" onclick="printPage()">
                    <i class="fas fa-print"></i> Imprimer
                </button>
                <a href="{{ route('attestations.show', $attestation->id) }}" class="btn-modern btn-secondary">
                    <i class="fas fa-eye"></i> Voir les détails
                </a>
                <a href="{{ route('attestations.index') }}" class="btn-modern btn-info">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
/* Print Header */
.print-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 2rem;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.company-logo {
    flex-shrink: 0;
}

.logo-img {
    width: 120px;
    height: 80px;
    object-fit: contain;
    background: white;
    border-radius: 10px;
    padding: 0.5rem;
}

.company-info {
    flex: 1;
}

.company-name {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.document-title {
    margin: 0.5rem 0 0;
    font-size: 1.2rem;
    opacity: 0.9;
    text-transform: uppercase;
    font-weight: 600;
}

/* Content Card */
.content-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.card-header-modern {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    color: white;
    padding: 1.5rem 2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.card-header-modern h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.card-header-modern i {
    font-size: 1.5rem;
}

.card-body-modern {
    padding: 2rem;
}

/* Attestation Content */
.attestation-content {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 2rem;
    border: 2px solid #dee2e6;
}

.attestation-text {
    background: white;
    padding: 3rem;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    position: relative;
}

.lead {
    font-size: 1.125rem;
    color: #333;
    margin-bottom: 1.5rem;
    line-height: 1.8;
    text-align: justify;
}

.attestation-footer {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #dee2e6;
    text-align: right;
}

.attestation-footer .lead {
    margin-bottom: 1rem;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    flex-wrap: wrap;
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

.btn-info {
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    color: white;
}

.btn-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(14, 165, 233, 0.4);
    color: white;
}

/* Print Styles */
@media print {
    .action-buttons,
    .print-header,
    .card-header-modern {
        display: none !important;
    }
    
    .attestation-text {
        box-shadow: none;
        border: 1px solid #000;
    }
    
    .content-card {
        box-shadow: none;
        border: 1px solid #ddd;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .print-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .company-name {
        font-size: 1.5rem;
    }
    
    .attestation-text {
        padding: 1.5rem;
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
}

@media (max-width: 576px) {
    .print-header {
        padding: 1.5rem;
    }
    
    .logo-img {
        width: 100px;
        height: 70px;
    }
    
    .company-name {
        font-size: 1.3rem;
    }
    
    .document-title {
        font-size: 1rem;
    }
    
    .card-header-modern {
        padding: 1rem;
    }
    
    .card-body-modern {
        padding: 1.5rem;
    }
    
    .attestation-content {
        padding: 1rem;
    }
    
    .attestation-text {
        padding: 1rem;
    }
    
    .lead {
        font-size: 1rem;
    }
}
</style>
@stop

@section('js')
<script>
function printPage() {
    // Hide the print button before printing
    document.getElementById('printPageButton').style.display = 'none';
    
    // Print the page
    window.print();
    
    // Show the print button again after printing
    setTimeout(() => {
        document.getElementById('printPageButton').style.display = 'inline-flex';
    }, 1000);
}

// Auto-hide print button when print dialog opens
window.addEventListener('beforeprint', function() {
    document.getElementById('printPageButton').style.display = 'none';
});

// Auto-show print button when print dialog closes
window.addEventListener('afterprint', function() {
    document.getElementById('printPageButton').style.display = 'inline-flex';
});
</script>
@stop
