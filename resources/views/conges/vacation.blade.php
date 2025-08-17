@extends('adminlte::page')

@section('title', 'Employes Management System | ' . ($conge->employe ? $conge->employe->nomComplet : 'Employé'))

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
                    <p class="document-title">Demande de congé administratif personnel</p>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="content-card">
                <div class="card-header-modern">
                    <h3><i class="fas fa-user"></i> L'Intéressé</h3>
                </div>
                <div class="card-body-modern">
                    <div class="employee-details">
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-user"></i>
                                Nom et Prénom :
                            </div>
                            <div class="detail-value">
                                {{ $conge->employe ? $conge->employe->nomComplet : 'Non disponible' }}
                            </div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-cogs"></i>
                                Service :
                            </div>
                            <div class="detail-value">
                                @if($conge->employe && $conge->employe->service)
                                    {{ $conge->employe->service->titre }}
                                @else
                                    Non disponible
                                @endif
                            </div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-sitemap"></i>
                                Division :
                            </div>
                            <div class="detail-value">
                                @if($conge->employe && $conge->employe->service && $conge->employe->service->division)
                                    {{ $conge->employe->service->division->nomD }}
                                @else
                                    Non disponible
                                @endif
                            </div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-calendar-day"></i>
                                Type d'absence :
                            </div>
                            <div class="detail-value">{{ $conge->droitConge }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-history"></i>
                                Dernier congé pris :
                            </div>
                            <div class="detail-value">{{ $conge->dataDepart }}</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-clock"></i>
                                Durée demandée :
                            </div>
                            <div class="detail-value">{{ $conge->duree }} jours</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-plane-departure"></i>
                                Date de départ souhaitée :
                            </div>
                            <div class="detail-value">{{ $conge->dataDepart }}</div>
                        </div>
                    </div>

                    <div class="date-section">
                        <p class="date-text">
                            Safi, le <strong>{{ date('d/m/Y') }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Manager Section -->
            <div class="content-card mt-4">
                <div class="card-header-modern">
                    <h3><i class="fas fa-clipboard-check"></i> À remplir par le responsable</h3>
                </div>
                <div class="card-body-modern">
                    <div class="manager-fields">
                        <div class="field-row">
                            <div class="field-label">Avis du responsable direct</div>
                            <div class="field-line">...............................................</div>
                        </div>
                        
                        <div class="field-row">
                            <div class="field-label">Intérimaire proposé</div>
                            <div class="field-line">.....................................................</div>
                        </div>
                        
                        <div class="field-row">
                            <div class="field-label">Date</div>
                            <div class="field-line">Marrakech, le ________________</div>
                        </div>
                        
                        <div class="signature-section">
                            <div class="signature-item">
                                <div class="signature-line">...............................................</div>
                                <div class="signature-label">VISA CHEF DE SERVICE</div>
                            </div>
                            
                            <div class="signature-item">
                                <div class="signature-line">...............................................</div>
                                <div class="signature-label">CHEF DE DIVISION</div>
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
                <a href="{{ route('conges.show', $conge->id) }}" class="btn-modern btn-secondary">
                    <i class="fas fa-eye"></i> Voir les détails
                </a>
                <a href="{{ route('conges.index') }}" class="btn-modern btn-info">
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

/* Employee Details */
.employee-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.detail-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.detail-row:hover {
    transform: translateY(-3px);
}

.detail-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #4a5568;
    min-width: 200px;
}

.detail-label i {
    color: #ff9a9e;
    width: 20px;
}

.detail-value {
    font-weight: 500;
    color: #2d3748;
    flex: 1;
}

/* Date Section */
.date-section {
    text-align: right;
    padding: 1rem;
    background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
    border-radius: 15px;
}

.date-text {
    margin: 0;
    font-size: 1.1rem;
    color: #2d3748;
    font-weight: 600;
}

/* Manager Fields */
.manager-fields {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.field-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 10px;
    border-left: 4px solid #667eea;
}

.field-label {
    font-weight: 600;
    color: #4a5568;
    min-width: 200px;
}

.field-line {
    flex: 1;
    border-bottom: 2px solid #cbd5e0;
    padding: 0.5rem 0;
    color: #718096;
    font-family: 'Courier New', monospace;
}

/* Signature Section */
.signature-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #e2e8f0;
}

.signature-item {
    text-align: center;
}

.signature-line {
    border-bottom: 2px solid #cbd5e0;
    padding: 0.5rem 0;
    margin-bottom: 0.5rem;
    color: #718096;
    font-family: 'Courier New', monospace;
}

.signature-label {
    font-weight: 600;
    color: #4a5568;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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
    .btn-modern {
        display: none !important;
    }
    
    .print-header {
        background: white !important;
        color: #333 !important;
        box-shadow: none !important;
    }
    
    .content-card {
        box-shadow: none !important;
        border: 1px solid #ddd;
    }
    
    .card-header-modern {
        background: #f8f9fa !important;
        color: #333 !important;
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
    
    .employee-details {
        grid-template-columns: 1fr;
    }
    
    .detail-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .detail-label {
        min-width: auto;
    }
    
    .signature-section {
        grid-template-columns: 1fr;
        gap: 1rem;
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
