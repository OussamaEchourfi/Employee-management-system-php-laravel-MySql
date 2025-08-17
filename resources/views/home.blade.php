@extends('adminlte::page')

@section('title', 'OG COMMUNICATION')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Tableau de Bord
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card">
                <div class="welcome-content">
                    <h2 class="welcome-title">
                        <span class="text-primary">Bienvenue</span> sur votre tableau de bord
                    </h2>
                    <p class="welcome-subtitle">Gérez efficacement vos employés, divisions et services</p>
                    <div class="welcome-stats">
                        <span class="stat-item">
                            <i class="fas fa-clock text-info"></i>
                            {{ now()->format('d/m/Y H:i') }}
                        </span>
                    </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-primary">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Employe::count() }}</h3>
                        <p class="stat-card-label">Employés</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/employes') }}" class="stat-card-footer">
                    <span>Voir tous les employés</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-success">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Devision::count() }}</h3>
                        <p class="stat-card-label">Divisions</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 72%"></div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/divisions') }}" class="stat-card-footer">
                    <span>Voir toutes les divisions</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-warning">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Service::count() }}</h3>
                        <p class="stat-card-label">Services</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 68%"></div>
                        </div>
        </div>
    </div>
                <a href="{{ url('admin/servicess') }}" class="stat-card-footer">
                    <span>Voir tous les services</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card stat-card-info">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Conge::count() }}</h3>
                        <p class="stat-card-label">Congés</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/conges') }}" class="stat-card-footer">
                    <span>Voir tous les congés</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Additional Cards Row -->
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="stat-card stat-card-purple">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Attestation::count() }}</h3>
                        <p class="stat-card-label">Attestations de travail</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/attestations') }}" class="stat-card-footer">
                    <span>Voir toutes les attestations</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-4">
            <div class="stat-card stat-card-gradient">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Employe::count() + \App\Models\Service::count() }}</h3>
                        <p class="stat-card-label">Total des ressources</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                <div class="stat-card-footer">
                    <span>Vue d'ensemble</span>
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-4">
            <div class="stat-card stat-card-tasks">
                <div class="stat-card-body">
                    <div class="stat-card-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3 class="stat-card-number">{{ \App\Models\Task::count() }}</h3>
                        <p class="stat-card-label">Tâches</p>
                        <div class="stat-card-progress">
                            <div class="progress-bar" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('admin/tasks') }}" class="stat-card-footer">
                    <span>Voir toutes les tâches</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="quick-actions-card">
                <h4 class="quick-actions-title">
                    <i class="fas fa-bolt text-warning mr-2"></i>
                    Actions Rapides
                </h4>
                <div class="quick-actions-grid">
                    <a href="{{ url('admin/employes/create') }}" class="quick-action-item">
                        <i class="fas fa-user-plus"></i>
                        <span>Ajouter un employé</span>
                    </a>
                    <a href="{{ url('admin/divisions/create') }}" class="quick-action-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Créer une division</span>
                    </a>
                    <a href="{{ url('admin/servicess/create') }}" class="quick-action-item">
                        <i class="fas fa-tools"></i>
                        <span>Ajouter un service</span>
                    </a>
                    <a href="{{ url('admin/conges/create') }}" class="quick-action-item">
                        <i class="fas fa-calendar-plus"></i>
                        <span>Demander un congé</span>
                    </a>
                    <a href="{{ url('admin/tasks/create') }}" class="quick-action-item">
                        <i class="fas fa-tasks"></i>
                        <span>Créer une tâche</span>
                    </a>
            </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* Welcome Section */
    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 2rem;
        color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }

    .welcome-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .welcome-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 1rem;
    }

    .welcome-stats {
        display: flex;
        gap: 1rem;
    }

    .stat-item {
        background: rgba(255,255,255,0.2);
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.9rem;
    }

    /* Statistics Cards */
    .stat-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        height: 100%;
        position: relative;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .stat-card-body {
        padding: 2rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .stat-card-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: white;
        flex-shrink: 0;
    }

    .stat-card-primary .stat-card-icon { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .stat-card-success .stat-card-icon { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .stat-card-warning .stat-card-icon { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .stat-card-info .stat-card-icon { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
    .stat-card-purple .stat-card-icon { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #333; }
    .stat-card-gradient .stat-card-icon { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: #333; }
    .stat-card-tasks .stat-card-icon { background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); color: #333; }

    .stat-card-content {
        flex: 1;
    }

    .stat-card-number {
        font-size: 3rem;
        font-weight: 800;
        margin: 0;
        color: #2d3748;
        line-height: 1;
    }

    .stat-card-label {
        font-size: 1.1rem;
        color: #718096;
        margin: 0.5rem 0;
        font-weight: 600;
    }

    .stat-card-progress {
        background: #e2e8f0;
        height: 6px;
        border-radius: 3px;
        overflow: hidden;
        margin-top: 1rem;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 3px;
        transition: width 0.6s ease;
    }

    .stat-card-footer {
        background: #f8fafc;
        padding: 1rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #4a5568;
        text-decoration: none;
        transition: all 0.3s ease;
        border-top: 1px solid #e2e8f0;
    }

    .stat-card-footer:hover {
        background: #edf2f7;
        color: #2d3748;
        text-decoration: none;
    }

    .stat-card-footer span {
        font-weight: 600;
    }

    .stat-card-footer i {
        transition: transform 0.3s ease;
    }

    .stat-card-footer:hover i {
        transform: translateX(5px);
    }

    /* Quick Actions */
    .quick-actions-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .quick-actions-title {
        color: #2d3748;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .quick-action-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 15px;
        text-decoration: none;
        color: #4a5568;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .quick-action-item:hover {
        background: white;
        color: #667eea;
        border-color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.15);
        text-decoration: none;
    }

    .quick-action-item i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: #667eea;
    }

    .quick-action-item span {
        font-weight: 600;
        text-align: center;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .welcome-title {
            font-size: 2rem;
        }
        
        .stat-card-body {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .stat-card-icon {
            width: 60px;
            height: 60px;
            font-size: 2rem;
        }
        
        .stat-card-number {
            font-size: 2.5rem;
        }
        
        .quick-actions-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }
    .stat-card:nth-child(5) { animation-delay: 0.5s; }
    .stat-card:nth-child(6) { animation-delay: 0.6s; }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: #667eea;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #5a67d8;
    }

    /* Footer Styles */
    .footer-section {
        background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
        color: white;
        padding: 2rem 0;
        margin-top: 3rem;
        border-radius: 20px 20px 0 0;
    }

    .footer-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .footer-description {
        color: #cbd5e0;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .footer-info {
        text-align: right;
    }

    .copyright {
        color: #cbd5e0;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .developer {
        color: #cbd5e0;
        font-size: 0.9rem;
        margin-bottom: 0;
    }

    .developer-link {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .developer-link:hover {
        color: #5a67d8;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .footer-info {
            text-align: left;
            margin-top: 1rem;
        }
    }
</style>
@stop

@section('js')
<script>
    // Add some interactive features
    document.addEventListener('DOMContentLoaded', function() {
        // Animate progress bars on scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target.querySelector('.progress-bar');
                    if (progressBar) {
                        progressBar.style.width = progressBar.style.width;
                    }
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stat-card').forEach(card => {
            observer.observe(card);
        });

        // Add click effects to cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    });
</script>
@stop

@section('footer')
<footer class="footer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-brand">
                    <h3 class="footer-title">
                        <span class="text-primary">OG</span> Manage
                    </h3>
                    <p class="footer-description">Gestion intelligente des ressources humaines</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-info">
                    <p class="copyright">
                        © 2025 OG Manage, Tous droits réservés
                    </p>
                    <p class="developer">
                        Créé par 
                        <a href="https://www.linkedin.com/in/oussama-ech-chourfi-854053292/" 
                           target="_blank" class="developer-link">
                            Ech-Chourfi Oussama
                        </a>
            </p>
        </div>
            </div>
        </div>
    </div>
</footer>
@endsection
