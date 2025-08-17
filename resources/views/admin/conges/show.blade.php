@extends('adminlte::page')

@section('title', 'Détails de la Demande de Congé')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-calendar-check me-3"></i>Détails de la Demande de Congé</h1>
            <p class="text-muted">Consultez et gérez cette demande de congé</p>
        </div>
        <div>
            <a href="{{ route('admin.conges.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Informations principales -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations de la Demande</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="fw-bold text-muted">Type de congé</label>
                                <p class="mb-0">{{ $conge->droitConge }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="fw-bold text-muted">Statut actuel</label>
                                <div>
                                    @switch($conge->status)
                                        @case('pending')
                                            <span class="badge bg-warning fs-6">⏳ En attente d'approbation</span>
                                            @break
                                        @case('approved')
                                            <span class="badge bg-success fs-6">✅ Demande approuvée</span>
                                            @break
                                        @case('rejected')
                                            <span class="badge bg-danger fs-6">❌ Demande rejetée</span>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="fw-bold text-muted">Date de départ</label>
                                <p class="mb-0">{{ $conge->dataDepart ? $conge->dataDepart->format('d/m/Y') : 'Non définie' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="fw-bold text-muted">Date de retour</label>
                                <p class="mb-0">{{ $conge->dateRetour ? $conge->dateRetour->format('d/m/Y') : 'Non définie' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="fw-bold text-muted">Durée du congé</label>
                                <p class="mb-0">{{ $conge->duree }} jour(s)</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <label class="fw-bold text-muted">Date de soumission</label>
                                <p class="mb-0">{{ $conge->created_at ? $conge->created_at->format('d/m/Y à H:i') : 'Date inconnue' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    @if($conge->motif)
                        <div class="info-item mb-3">
                            <label class="fw-bold text-muted">Motif du congé</label>
                            <p class="mb-0">{{ $conge->motif }}</p>
                        </div>
                    @endif
                    
                    @if($conge->updated_at && $conge->updated_at != $conge->created_at)
                        <div class="info-item mb-3">
                            <label class="fw-bold text-muted">Dernière modification</label>
                            <p class="mb-0">{{ $conge->updated_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Commentaire de l'admin -->
            @if($conge->admin_comment)
                <div class="card mt-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="fas fa-comment-dots me-2"></i>Commentaire de l'Administration</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $conge->admin_comment }}</p>
                        @if($conge->processed_at)
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Traité le {{ $conge->processed_at ? $conge->processed_at->format('d/m/Y à H:i') : 'Date inconnue' }}
                            </small>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Informations de l'employé et actions -->
        <div class="col-lg-4">
            <!-- Informations de l'employé -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>Informations de l'Employé</h5>
                </div>
                <div class="card-body text-center">
                    <div class="avatar-lg mb-3">
                        <i class="fas fa-user-circle fa-4x text-primary"></i>
                    </div>
                    <h5 class="mb-1">{{ $conge->employe->nomComplet }}</h5>
                    <p class="text-muted mb-2">{{ $conge->employe->service->titre ?? 'Service non défini' }}</p>
                    <div class="row text-center">
                        <div class="col-6">
                            <small class="text-muted">CIN</small>
                            <p class="mb-0 fw-bold">{{ $conge->employe->cin }}</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Date d'embauche</small>
                            <p class="mb-0 fw-bold">{{ $conge->employe->hire_date ? $conge->employe->hire_date->format('d/m/Y') : 'Non définie' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Actions</h5>
                </div>
                <div class="card-body">
                    @if($conge->status === 'pending')
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-success btn-lg" onclick="approveConge({{ $conge->id }})">
                                <i class="fas fa-check me-2"></i>Approuver la Demande
                            </button>
                            <button type="button" class="btn btn-danger btn-lg" onclick="rejectConge({{ $conge->id }})">
                                <i class="fas fa-times me-2"></i>Rejeter la Demande
                            </button>
                        </div>
                    @else
                        <div class="text-center">
                            @if($conge->status === 'approved')
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle me-2"></i>
                                    Cette demande a été approuvée
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <i class="fas fa-times-circle me-2"></i>
                                    Cette demande a été rejetée
                                </div>
                            @endif
                            
                            @if($conge->status === 'approved')
                                <button type="button" class="btn btn-warning" onclick="rejectConge({{ $conge->id }})">
                                    <i class="fas fa-undo me-2"></i>Changer en Rejeté
                                </button>
                            @else
                                <button type="button" class="btn btn-success" onclick="approveConge({{ $conge->id }})">
                                    <i class="fas fa-undo me-2"></i>Changer en Approuvé
                                </button>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
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
                                  placeholder="Ajoutez un commentaire si nécessaire...">{{ $conge->admin_comment }}</textarea>
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
                                  placeholder="Expliquez le motif du rejet..." required>{{ $conge->admin_comment }}</textarea>
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
    .info-item label {
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }
    
    .info-item p {
        font-size: 1.1rem;
        color: #2c3e50;
    }
    
    .avatar-lg {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .card {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border: none;
    }
    
    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        border: none;
    }
    
    .btn-lg {
        padding: 1rem 2rem;
        font-size: 1.1rem;
        border-radius: 12px;
    }
    
    .alert {
        border-radius: 12px;
        border: none;
    }
</style>
@stop

@section('js')
<script>
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
</script>
@stop
