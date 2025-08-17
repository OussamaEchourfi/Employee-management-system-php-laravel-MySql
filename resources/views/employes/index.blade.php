@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Liste des Employés')

@section('content_header')
@stop

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="header-content">
            <div class="header-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="header-info">
                <h1 class="header-title">Liste des Employés</h1>
                <p class="header-subtitle">Gestion complète des employés de l'entreprise</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('employes.create') }}" class="btn-modern btn-primary">
                    <i class="fas fa-plus"></i>
                    Nouvel Employé
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $employes->count() }}</div>
                    <div class="stat-label">Total Employés</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $employes->where('status', 'active')->count() }}</div>
                    <div class="stat-label">Actifs</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $employes->unique('division_id')->count() }}</div>
                    <div class="stat-label">Divisions</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $employes->unique('service_id')->count() }}</div>
                    <div class="stat-label">Services</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="content-card">
                <div class="card-header-modern">
                    <div class="header-left">
                        <i class="fas fa-table"></i>
                        <h3>Tableau des Employés</h3>
                    </div>
                    <div class="header-right">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" placeholder="Rechercher un employé...">
                        </div>
                    </div>
                </div>
                <div class="card-body-modern">
                    @include('layouts.alert')
                    <div class="table-responsive">
                        <table id="myTable" class="table-modern">
                    <thead>
                        <tr>
                            <th>ID</th>
                                    <th>Nom Complet</th>
                                    <th>CIN</th>
                                    <th>Date d'embauche</th>
                                    <th>Service</th>
                                    <th>Division</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $key => $employe)
                        <tr>
                                    <td>
                                        <div class="employee-id">{{ $key + 1 }}</div>
                                    </td>
                                    <td>
                                        <div class="employee-info">
                                            <div class="employee-avatar">
                                                <i class="fas fa-user-circle"></i>
                                            </div>
                                            <div class="employee-details">
                                                <div class="employee-name">{{ $employe->nomComplet }}</div>
                                                <div class="employee-phone">{{ $employe->phone ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cin-badge">{{ $employe->cin }}</div>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $employe->hire_date }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="service-badge">{{ $employe->titre }}</div>
                                    </td>
                                    <td>
                                        <div class="division-badge">{{ $employe->division->nomD ?? 'N/A' }}</div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('employes.show', $employe->id) }}" class="btn-action btn-view" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                            <a href="{{ route('employes.edit', $employe->id) }}" class="btn-action btn-edit" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                            <button type="button" class="btn-action btn-delete" title="Supprimer" onclick="confirmDelete({{ $employe->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $employe->id }}" action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                        </div>
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

    /* Stats Cards */
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 1rem;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
  font-size: 1.5rem;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #6c757d;
  text-transform: uppercase;
        letter-spacing: 0.5px;
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

    .header-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .search-box {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-box i {
        position: absolute;
        left: 1rem;
        color: #6c757d;
    }

    .search-box input {
        background: rgba(255,255,255,0.9);
  border: none;
        border-radius: 25px;
        padding: 0.5rem 1rem 0.5rem 2.5rem;
        color: #2d3748;
        font-size: 0.9rem;
        width: 250px;
    }

    .search-box input::placeholder {
        color: #6c757d;
    }

    .card-body-modern {
        padding: 2rem;
    }

    /* Modern Table */
    .table-modern {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 0.75rem;
    }

    .table-modern thead th {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #2d3748;
  font-weight: 600;
        padding: 1rem;
        text-align: left;
        border: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .table-modern tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .table-modern tbody td {
        padding: 1rem;
        border: none;
  vertical-align: middle;
    }

    /* Employee Info */
    .employee-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .employee-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .employee-name {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .employee-phone {
        font-size: 0.8rem;
        color: #6c757d;
    }

    /* Badges */
    .cin-badge, .service-badge, .division-badge {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: #2d3748;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }

    .employee-id {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .date-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .date-info i {
        color: #667eea;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-action {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.9rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .btn-view {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .btn-edit {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    }

    /* Modern Button */
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
        background: rgba(255,255,255,0.2);
        color: white;
        border: 2px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(10px);
    }

.btn-primary:hover {
        background: rgba(255,255,255,0.3);
  transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
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

        .search-box input {
            width: 200px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }

        .btn-action {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
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
            flex-direction: column;
            gap: 1rem;
        }

        .card-body-modern {
            padding: 1rem;
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
                {
                    extend: 'copy',
                    className: 'btn-modern btn-secondary',
                    text: '<i class="fas fa-copy"></i> Copier'
                },
                {
                    extend: 'excel',
                    className: 'btn-modern btn-success',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'csv',
                    className: 'btn-modern btn-info',
                    text: '<i class="fas fa-file-csv"></i> CSV'
                },
                {
                    extend: 'pdf',
                    className: 'btn-modern btn-danger',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                },
                {
                    extend: 'print',
                    className: 'btn-modern btn-warning',
                    text: '<i class="fas fa-print"></i> Imprimer'
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
            },
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
            responsive: true,
            order: [[1, 'asc']]
        });

        // Search functionality
        $('#searchInput').on('keyup', function() {
            $('#myTable').DataTable().search(this.value).draw();
        });
    });

    function confirmDelete(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler',
            reverseButtons: true,
            background: '#fff',
            backdrop: 'rgba(0,0,0,0.4)'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Annulé',
                    'L\'employé est en sécurité :)',
                    'error'
                )
            }
        })
    }
</script>

@if(session()->has("success"))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{ session()->get('success') }}",
        showConfirmButton: false,
        timer: 3500,
        background: '#fff',
        backdrop: 'rgba(0,0,0,0.4)'
    });
</script>
@endif
@stop
