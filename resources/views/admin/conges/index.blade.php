@extends('adminlte::page')

@section('title', 'Gestion des Demandes de Congé')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-calendar-alt me-3"></i>Gestion des Demandes de Congé</h1>
            <p class="text-muted">Approuvez ou rejetez les demandes de congé des employés</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-info" onclick="exportData()">
                <i class="fas fa-download me-2"></i>Exporter
            </button>
            <button class="btn btn-outline-secondary" onclick="showFilters()">
                <i class="fas fa-filter me-2"></i>Filtres
            </button>
        </div>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-calendar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total des demandes</span>
                    <span class="info-box-number">{{ $conges->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">En attente</span>
                    <span class="info-box-number">{{ $conges->where('status', 'pending')->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Approuvées</span>
                    <span class="info-box-number">{{ $conges->where('status', 'approved')->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><i class="fas fa-times"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Rejetées</span>
                    <span class="info-box-number">{{ $conges->where('status', 'rejected')->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card mb-4" id="filtersCard" style="display: none;">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Filtres</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.conges.filter') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="status" class="form-label">Statut</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Tous les statuts</option>
                        <option value="pending">En attente</option>
                        <option value="approved">Approuvé</option>
                        <option value="rejected">Rejeté</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="employe" class="form-label">Employé</label>
                    <select class="form-select" id="employe" name="employe_id">
                        <option value="">Tous les employés</option>
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}">{{ $employe->nomComplet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="date_debut" class="form-label">Date début</label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut">
                </div>
                <div class="col-md-3">
                    <label for="date_fin" class="form-label">Date fin</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Filtrer
                    </button>
                    <a href="{{ route('admin.conges.index') }}" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-times me-2"></i>Réinitialiser
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Liste des demandes -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Liste des Demandes de Congé</h5>
        </div>
        <div class="card-body">
            @if($conges->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Employé</th>
                                <th>Type de congé</th>
                                <th>Dates</th>
                                <th>Durée</th>
                                <th>Statut</th>
                                <th>Date soumission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($conges as $conge)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3">
                                                <i class="fas fa-user-circle fa-2x text-primary"></i>
                                            </div>
                                            <div>
                                                <strong>{{ $conge->employe->nomComplet }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $conge->employe->service->titre ?? 'Service non défini' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $conge->droitConge }}</span>
                                    </td>
                                    <td>
                                        <div>
                                            <strong>Départ:</strong> {{ $conge->dataDepart ? $conge->dataDepart->format('d/m/Y') : 'Non définie' }}<br>
                                            <strong>Retour:</strong> {{ $conge->dateRetour ? $conge->dateRetour->format('d/m/Y') : 'Non définie' }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $conge->duree }} jour(s)</span>
                                    </td>
                                    <td>
                                        @switch($conge->status)
                                            @case('pending')
                                                <span class="badge bg-warning">⏳ En attente</span>
                                                @break
                                            @case('approved')
                                                <span class="badge bg-success">✅ Approuvé</span>
                                                @break
                                            @case('rejected')
                                                <span class="badge bg-danger">❌ Rejeté</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <small>{{ $conge->created_at ? $conge->created_at->format('d/m/Y à H:i') : 'Date inconnue' }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.conges.show', $conge->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Voir les détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            @if($conge->status === 'pending')
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-success" 
                                                        onclick="approveConge({{ $conge->id }})"
                                                        title="Approuver">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        onclick="rejectConge({{ $conge->id }})"
                                                        title="Rejeter">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Aucune demande de congé</h5>
                    <p class="text-muted">Il n'y a actuellement aucune demande de congé à traiter.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal d'approbation -->
<div class="modal fade" id="approveModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check me-2"></i>Approuver la demande</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="approveForm" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir approuver cette demande de congé ?</p>
                    <div class="form-group">
                        <label for="admin_comment_approve" class="form-label">Commentaire (optionnel)</label>
                        <textarea class="form-control" id="admin_comment_approve" name="admin_comment" rows="3" 
                                  placeholder="Ajoutez un commentaire si nécessaire..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-2"></i>Approuver
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de rejet -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-times me-2"></i>Rejeter la demande</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir rejeter cette demande de congé ?</p>
                    <div class="form-group">
                        <label for="admin_comment_reject" class="form-label">Motif du rejet <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="admin_comment_reject" name="admin_comment" rows="3" 
                                  placeholder="Expliquez le motif du rejet..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times me-2"></i>Rejeter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .info-box {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .info-box:hover {
        transform: translateY(-5px);
    }
    
    .avatar-sm {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .table th {
        font-weight: 600;
        border-top: none;
    }
    
    .btn-group .btn {
        margin-right: 2px;
    }
    
    .btn-group .btn:last-child {
        margin-right: 0;
    }
</style>
@stop

@section('js')
<script>
    function showFilters() {
        const filtersCard = document.getElementById('filtersCard');
        filtersCard.style.display = filtersCard.style.display === 'none' ? 'block' : 'none';
    }
    
    function approveConge(congeId) {
        const modal = new bootstrap.Modal(document.getElementById('approveModal'));
        const form = document.getElementById('approveForm');
        form.action = `/admin/conges-requests/${congeId}/approve`;
        modal.show();
    }
    
    function rejectConge(congeId) {
        const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
        const form = document.getElementById('rejectForm');
        form.action = `/admin/conges-requests/${congeId}/reject`;
        modal.show();
    }
    
    function exportData() {
        // Rediriger vers la route d'export
        window.location.href = '{{ route("admin.conges.export") }}';
    }
    
    // Initialiser les tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@stop
