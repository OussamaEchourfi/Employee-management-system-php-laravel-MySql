@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Attestations List')

@section('content_header')
@stop

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="header-content">
            <div class="header-icon">
                <i class="fas fa-certificate"></i>
            </div>
            <div class="header-info">
                <h1 class="header-title">Liste Attestations</h1>
                <p class="header-subtitle">Gestion complète des attestations de l'entreprise</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('attestations.create') }}" class="btn-modern btn-primary">
                    <i class="fas fa-plus"></i>
                    Nouvelle Attestation
                </a>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $attestations->count() }}</div>
                    <div class="stat-label">Total</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $attestations->where('status', 'active')->count() }}</div>
                    <div class="stat-label">Actives</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $attestations->where('status', 'pending')->count() }}</div>
                    <div class="stat-label">En attente</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $attestations->where('created_at', '>=', now()->startOfMonth())->count() }}</div>
                    <div class="stat-label">Ce mois</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Alert Messages -->
    <div class="row my-3">
        <div class="col-md-6 mx-auto">
            @include('layouts.alert')
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="content-card">
                <div class="card-header-modern">
                    <div class="header-left">
                        <i class="fas fa-table"></i>
                        <h3>Tableau des Attestations</h3>
                    </div>
                    <div class="header-right">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" placeholder="Rechercher...">
                        </div>
                    </div>
                </div>
                <div class="card-body-modern">
                    <div class="table-responsive">
                        <table id="myTable" class="table-modern">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employé</th>
                                    <th>Date de Création</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attestations as $attestation)
                                <tr>
                                    <td>{{ $attestation->id }}</td>
                                    <td>
                                        @if($attestation->employe)
                                            {{ $attestation->employe->nomComplet }}
                                        @else
                                            <span class="text-muted">Employé supprimé</span>
                                        @endif
                                    </td>
                                    <td>{{ $attestation->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="status-badge status-active">
                                            <i class="fas fa-check-circle"></i>
                                            Active
                                        </span>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('attestations.show', $attestation->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('attestations.edit', $attestation->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('attestations.certificate', $attestation->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        <form id="delete-form-{{ $attestation->id }}" action="{{ route('attestations.destroy', $attestation->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $attestation->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

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

/* Stats Cards */
.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
    border-left: 4px solid #667eea;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.stat-icon i {
    font-size: 1.5rem;
    color: white;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #718096;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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

.search-box {
    position: relative;
    display: flex;
    align-items: center;
}

.search-box i {
    position: absolute;
    left: 1rem;
    color: rgba(255,255,255,0.8);
}

.search-box input {
    background: rgba(255,255,255,0.2);
    border: none;
    border-radius: 25px;
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    color: white;
    width: 250px;
}

.search-box input::placeholder {
    color: rgba(255,255,255,0.8);
}

.card-body-modern {
    padding: 2rem;
}

/* Table Styles */
.table-modern {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.table-modern thead th {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    font-weight: 600;
    padding: 1rem;
    text-align: left;
    border: none;
}

.table-modern tbody tr {
    background: white;
    transition: all 0.3s ease;
}

.table-modern tbody tr:hover {
    background: #f7fafc;
    transform: scale(1.01);
}

.table-modern tbody td {
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
}

/* Status Badge */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.875rem;
    font-weight: 600;
}

.status-active {
    background: rgba(40, 167, 69, 0.1);
    color: #155724;
    border: 1px solid rgba(40, 167, 69, 0.2);
}

/* Buttons */
.btn {
    border-radius: 8px;
    padding: 0.5rem 0.75rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.btn-info {
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    color: white;
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.btn-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    color: white;
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
    
    .search-box input {
        width: 200px;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
}
</style>
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
        }
    });
});

function confirmDelete(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger me-2'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Êtes-vous sûr?',
        text: "Cette action ne peut pas être annulée!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, supprimer!',
        cancelButtonText: 'Non, annuler!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Annulé',
                'Votre élément est en sécurité :)',
                'error'
            )
        }
    });
}
</script>

@if(session()->has("success"))
<script>
Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: "{{ session()->get('success') }}",
    showConfirmButton: false,
    timer: 3500
});
</script>
@endif
@stop
