<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OG Communication - Système de Gestion des Employés</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Page Loader -->
<div class="page-loader" id="pageLoader">
    <div class="loader-content">
        <div class="loader-logo">
            <span class="logo-text">OG</span>
        </div>
        <div class="loader-text">Chargement...</div>
        <div class="loader-spinner"></div>
    </div>
</div>

<!-- Reading Progress Bar -->
<div class="reading-progress-bar" id="readingProgressBar"></div>

<!-- Modern Navbar with OG Style -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <div class="brand-logo-container">
                <div class="brand-logo">
                    <span class="logo-text">OG</span>
                </div>
            </div>
            <div class="brand-text">
                <span class="brand-name">OG Communication</span>
                <span class="brand-tagline">Excellence Digitale</span>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#features">Fonctionnalités</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#live-stats">Statistiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Témoignages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quick-access">Accès</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="btn btn-gradient me-2">
                        <i class="fas fa-user-shield me-1"></i>Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employe.login') }}" class="btn btn-outline-gradient">
                        <i class="fas fa-user-tie me-1"></i>Employé
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section with Dynamic Background -->
<section id="home" class="hero-section">
    <div class="hero-background">
        <div class="gradient-bg"></div>
        <div class="particles" id="particles"></div>
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="hero-badge">
                        <span class="badge-icon">
                            <i class="fas fa-star"></i>
                        </span>
                        <span class="badge-text">Système de Gestion d'Entreprise</span>
                    </div>
                    
                    <div class="welcome-message" id="welcomeMessage">
                        <span class="welcome-text">Bienvenue sur votre plateforme RH</span>
                        <span class="welcome-time" id="welcomeTime"></span>
                    </div>
                    
                    <h1 class="hero-title">
                        Gestion RH 
                        <span class="text-gradient">Professionnelle</span>
                        <br>
                        <span class="hero-subtitle">pour Entreprises Modernes</span>
                    </h1>
                    
                    <p class="hero-description">
                        Solution complète et intuitive pour optimiser la gestion de vos ressources humaines. 
                        Développé avec les technologies les plus modernes pour garantir performance, sécurité et fiabilité.
                    </p>
                    
                    <div class="hero-features">
                        <div class="feature-pill">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <span>Sécurisé & Conforme</span>
                        </div>
                        <div class="feature-pill">
                            <div class="feature-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <span>Performance Optimale</span>
                        </div>
                        <div class="feature-pill">
                            <div class="feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <span>Support 24/7</span>
                        </div>
                    </div>
                    
                    <div class="hero-buttons">
                        <a href="{{ route('home') }}" class="btn btn-hero-primary">
                            <span class="btn-text">Commencer Maintenant</span>
                            <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                        <a href="#about" class="btn btn-hero-secondary">
                            <span class="btn-text">Découvrir Plus</span>
                            <span class="btn-icon"><i class="fas fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 d-none d-lg-block">
                <div class="hero-visual">
                    <div class="dashboard-mockup">
                        <div class="mockup-header">
                            <div class="mockup-dots">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <div class="mockup-title">Dashboard RH</div>
                        </div>
                        <div class="mockup-content">
                            <div class="chart-container">
                                <canvas id="demoChart" width="400" height="200"></canvas>
                            </div>
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stat-value">248</div>
                                    <div class="stat-label">Employés</div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="stat-value">98%</div>
                                    <div class="stat-label">Satisfaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="floating-elements">
                        <div class="float-card card-1">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-content">
                                <h5>Gestion RH</h5>
                                <p>Complète & Intuitive</p>
                            </div>
                        </div>
                        
                        <div class="float-card card-2">
                            <div class="card-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="card-content">
                                <h5>Analytics</h5>
                                <p>Temps Réel</p>
                            </div>
                        </div>
                        
                        <div class="float-card card-3">
                            <div class="card-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="card-content">
                                <h5>Sécurité</h5>
                                <p>Protection Max</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-mouse">
            <div class="scroll-wheel"></div>
        </div>
        <span>Explorer</span>
    </div>
</section>

<!-- About Section with OG Style -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-badge">
                    <span class="badge-number">01</span>
                    <span class="badge-text">À propos de notre entreprise</span>
                </div>
                <h2 class="section-title">
                    OG Communication
                    <span class="title-highlight">Votre partenaire digital</span>
                </h2>
                <p class="section-subtitle">
                    Créativité, compétences et expérience depuis 2019
                </p>
            </div>
        </div>
        
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="content-steps">
                        <div class="step-item">
                            <div class="step-number">01</div>
                            <div class="step-content">
                                <h4>Conseils</h4>
                                <p>Analyse approfondie de vos besoins et définition d'une stratégie adaptée à vos objectifs business.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">02</div>
                            <div class="step-content">
                                <h4>Action</h4>
                                <p>Conception, design et création de vos supports digitaux avec une attention aux détails et qualité premium.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">03</div>
                            <div class="step-content">
                                <h4>Suivi</h4>
                                <p>Accompagnement complet et suivi personnalisé pour garantir le succès et la pérennité de vos projets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="about-stats-container">
                    <div class="stats-grid">
                        <div class="stat-box">
                            <div class="stat-number" data-count="8">0</div>
                            <div class="stat-label">Ans d'expérience</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number" data-count="350">0</div>
                            <div class="stat-label">Projets réalisés</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number" data-count="500">0</div>
                            <div class="stat-label">Clients satisfaits</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number" data-count="5">0</div>
                            <div class="stat-label">Certificats</div>
                        </div>
                    </div>
                    
                    <div class="about-image">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="OG Communication Team" class="img-fluid">
                            <div class="image-overlay"></div>
                            <div class="image-badge">
                                <i class="fas fa-award"></i>
                                <span>Excellence Certifiée</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Features Section -->
<section id="features" class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-badge">
                    <span class="badge-number">02</span>
                    <span class="badge-text">Fonctionnalités Principales</span>
                </div>
                <h2 class="section-title">
                    Tout ce dont vous avez besoin pour
                    <span class="title-highlight">gérer vos RH</span>
                </h2>
                <p class="section-subtitle">
                    Un système complet et intuitif pour optimiser la gestion de vos ressources humaines
                </p>
            </div>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Gestion des Employés</h4>
                <p>Gérez facilement les informations de vos employés, leurs profils, et leurs données personnelles.</p>
                <ul class="feature-list">
                    <li>Profils complets des employés</li>
                    <li>Gestion des divisions et services</li>
                    <li>Historique des employés</li>
                    <li>Import/Export des données</li>
                </ul>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h4>Gestion des Congés</h4>
                <p>Simplifiez la gestion des demandes de congés avec un système de validation automatisé.</p>
                <ul class="feature-list">
                    <li>Demandes de congés en ligne</li>
                    <li>Validation hiérarchique</li>
                    <li>Calendrier des congés</li>
                    <li>Gestion des soldes</li>
                </ul>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h4>Gestion des Tâches</h4>
                <p>Suivez et gérez les tâches de vos équipes avec un système de suivi en temps réel.</p>
                <ul class="feature-list">
                    <li>Création et assignation</li>
                    <li>Suivi du statut</li>
                    <li>Priorités et deadlines</li>
                    <li>Rapports de progression</li>
                </ul>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h4>Attestations & Documents</h4>
                <p>Générez automatiquement les attestations et documents nécessaires pour vos employés.</p>
                <ul class="feature-list">
                    <li>Attestations de travail</li>
                    <li>Certificats de formation</li>
                    <li>Modèles personnalisables</li>
                    <li>Archivage sécurisé</li>
                </ul>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h4>Rapports & Statistiques</h4>
                <p>Analysez vos données RH avec des tableaux de bord et rapports détaillés.</p>
                <ul class="feature-list">
                    <li>Tableaux de bord interactifs</li>
                    <li>Rapports personnalisables</li>
                    <li>Statistiques en temps réel</li>
                    <li>Export des données</li>
                </ul>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Sécurité & Conformité</h4>
                <p>Garantissez la sécurité de vos données avec des fonctionnalités de protection avancées.</p>
                <ul class="feature-list">
                    <li>Authentification sécurisée</li>
                    <li>Gestion des permissions</li>
                    <li>Audit des actions</li>
                    <li>Conformité RGPD</li>
                </ul>
            </div>
        </div>
    </div>
</section>



<!-- Live Stats Section -->
<section id="live-stats" class="live-stats-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-badge">
                    <span class="badge-number">03</span>
                    <span class="badge-text">Statistiques en Temps Réel</span>
                </div>
                <h2 class="section-title text-white">
                    Votre Système
                    <span class="title-highlight">en Chiffres</span>
                </h2>
                <p class="section-subtitle text-white-50">
                    Découvrez l'activité et les performances de votre système de gestion RH
                </p>
            </div>
        </div>
        
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" data-count="248">0</div>
                    <div class="stat-label">Employés Actifs</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+12% ce mois</span>
                    </div>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" data-count="156">0</div>
                    <div class="stat-label">Congés Approuvés</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+8% ce mois</span>
                    </div>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" data-count="89">0</div>
                    <div class="stat-label">Tâches Complétées</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+15% ce mois</span>
                    </div>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" data-count="234">0</div>
                    <div class="stat-label">Documents Générés</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+22% ce mois</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="performance-indicators">
                    <div class="indicator">
                        <div class="indicator-circle">
                            <svg viewBox="0 0 36 36" class="circular-chart">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                <path class="circle" stroke-dasharray="95, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            </svg>
                            <div class="indicator-value">95%</div>
                        </div>
                        <div class="indicator-label">Satisfaction Utilisateur</div>
                    </div>
                    
                    <div class="indicator">
                        <div class="indicator-circle">
                            <svg viewBox="0 0 36 36" class="circular-chart">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                <path class="circle" stroke-dasharray="98, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            </svg>
                            <div class="indicator-value">98%</div>
                        </div>
                        <div class="indicator-label">Disponibilité Système</div>
                    </div>
                    
                    <div class="indicator">
                        <div class="indicator-circle">
                            <svg viewBox="0 0 36 36" class="circular-chart">
                                <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                <path class="circle" stroke-dasharray="92, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                            </svg>
                            <div class="indicator-value">92%</div>
                        </div>
                        <div class="indicator-label">Performance</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-badge">
                    <span class="badge-number">04</span>
                    <span class="badge-text">Témoignages Clients</span>
                </div>
                <h2 class="section-title">
                    Ce que disent nos
                    <span class="title-highlight">clients satisfaits</span>
                </h2>
                <p class="section-subtitle">
                    Découvrez les retours d'expérience de nos clients qui utilisent notre système au quotidien
                </p>
            </div>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">
                        "Le système de gestion RH d'OG Communication a révolutionné notre façon de gérer nos employés. 
                        L'interface est intuitive et les fonctionnalités sont complètes. Nous avons gagné un temps précieux !"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h5>Ahmed Benali</h5>
                            <span>Directeur RH - TechCorp</span>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">
                        "Excellent support client et système très fiable. La gestion des congés est devenue un jeu d'enfant 
                        et nos employés adorent l'interface moderne et responsive."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h5>Fatima Zahra</h5>
                            <span>Responsable Administration - InnovSoft</span>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">
                        "Nous utilisons ce système depuis plus d'un an et nous sommes très satisfaits. 
                        Les rapports sont détaillés et la sécurité des données est excellente. Je recommande vivement !"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h5>Karim Mansouri</h5>
                            <span>CEO - Digital Solutions</span>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="testimonial-stats">
                    <div class="stat-item-small">
                        <div class="stat-number-small">98%</div>
                        <div class="stat-label-small">Clients Satisfaits</div>
                    </div>
                    <div class="stat-item-small">
                        <div class="stat-number-small">4.9/5</div>
                        <div class="stat-label-small">Note Moyenne</div>
                    </div>
                    <div class="stat-item-small">
                        <div class="stat-number-small">500+</div>
                        <div class="stat-label-small">Clients Actifs</div>
                    </div>
                    
                    <div class="stat-item-small">
                        <div class="stat-number-small" id="visitorCount">1</div>
                        <div class="stat-label-small">Visiteur en ligne</div>
                    </div>
                    
                    <div class="stat-item-small">
                        <div class="stat-number-small" id="timeSpent">0</div>
                        <div class="stat-label-small">Minutes passées</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="cta" class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="cta-content">
                    <h2 class="cta-title">
                        Prêt à transformer votre
                        <span class="title-highlight">gestion RH ?</span>
                    </h2>
                    <p class="cta-description">
                        Rejoignez des centaines d'entreprises qui ont déjà optimisé leurs processus RH avec notre système
                    </p>
                    <div class="cta-buttons">
                        <a href="{{ route('home') }}" class="btn btn-cta-primary">
                            <span>Essayer Gratuitement</span>
                            <i class="fas fa-rocket"></i>
                        </a>
                        <a href="#contact" class="btn btn-cta-secondary">
                            <span>Demander une Démo</span>
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                    <div class="cta-features">
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Essai gratuit de 30 jours</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Support technique inclus</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Migration des données gratuite</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Access Section -->
<section id="quick-access" class="quick-access-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-badge">
                    <span class="badge-number">05</span>
                    <span class="badge-text">Accès Rapide</span>
                </div>
                <h2 class="section-title text-white">
                    Accédez à votre
                    <span class="title-highlight">Espace de Travail</span>
                </h2>
                <p class="section-subtitle text-white-50">
                    Connectez-vous rapidement à votre espace administrateur ou employé
                </p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="access-card admin-card">
                    <div class="card-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h4>Espace Administrateur</h4>
                    <p>Gérez vos employés, congés, attestations et tâches avec des outils puissants et intuitifs.</p>
                    <div class="card-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Gestion des employés</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Validation des congés</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Suivi des tâches</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Rapports et statistiques</span>
                        </div>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-access-primary">
                        <span>Accéder à l'Admin</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="access-note">
                        <i class="fas fa-info-circle"></i>
                        <small>Connexion requise</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="access-card employe-card">
                    <div class="card-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Espace Employé</h4>
                    <p>Consultez vos informations, gérez vos congés et suivez vos tâches en temps réel.</p>
                    <div class="card-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Profil personnel</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Demande de congés</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Suivi des tâches</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Historique personnel</span>
                        </div>
                    </div>
                    <a href="{{ route('employe.login') }}" class="btn btn-access-secondary">
                        <span>Accéder à l'Espace</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="system-info">
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Système Sécurisé</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span>Disponible 24/7</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Responsive Design</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-sync-alt"></i>
                        <span>Mise à jour en temps réel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-badge">
                    <span class="badge-number">06</span>
                    <span class="badge-text">Contact Professionnel</span>
                </div>
                <h2 class="section-title">
                    Parlons de votre projet
                    <span class="title-highlight">Contactez-nous dès maintenant</span>
                </h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="contact-form-container">
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom complet</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email professionnel</label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="tel" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sujet du projet</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Détails de votre projet</label>
                                    <textarea class="form-control" rows="5" placeholder="Décrivez votre projet, vos objectifs et vos attentes..." required></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-send-message">
                                    <span class="btn-text">Envoyer le message</span>
                                    <span class="btn-icon"><i class="fas fa-paper-plane"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="contact-info">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <h5>Appelez-nous</h5>
                                <p>+212 6 XX XX XX XX</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h5>Écrivez-nous</h5>
                                <p>contact@ogcommunication.ma</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h5>Visitez-nous</h5>
                                <p>Marrakech, Maroc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="footer-brand">
                    <div class="brand-logo">
                        <span class="logo-text">OG</span>
                    </div>
                    <span class="brand-name">OG Communication</span>
                </div>
                <p class="footer-description">
                    Votre partenaire digital de confiance pour la transformation numérique de votre entreprise
                </p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h5>Liens rapides</h5>
                <ul class="footer-links">
                    <li><a href="#home">Accueil</a></li>
                    <li><a href="#features">Fonctionnalités</a></li>
                    <li><a href="#live-stats">Statistiques</a></li>
                    <li><a href="#testimonials">Témoignages</a></li>
                    <li><a href="#cta">Essayer</a></li>
                    <li><a href="#quick-access">Accès</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h5>Services</h5>
                <ul class="footer-links">
                    <li><a href="#">Gestion RH</a></li>
                    <li><a href="#">Développement Web</a></li>
                    <li><a href="#">Marketing Digital</a></li>
                    <li><a href="#">Design Graphique</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h5>Contact</h5>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> Marrakech, Maroc</p>
                    <p><i class="fas fa-phone"></i> +212 6 XX XX XX XX</p>
                    <p><i class="fas fa-envelope"></i> contact@ogcommunication.ma</p>
                </div>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright">© 2024 OG Communication. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="legal-links">
                    <a href="#">Politique de confidentialité</a> | 
                    <a href="#">Conditions d'utilisation</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Welcome Notification -->
<div class="welcome-notification" id="welcomeNotification">
    <div class="notification-content">
        <div class="notification-icon">
            <i class="fas fa-hand-wave"></i>
        </div>
        <div class="notification-text">
            <h5>Bienvenue sur OG Communication !</h5>
            <p>Découvrez notre système de gestion RH professionnel</p>
        </div>
        <button class="notification-close" onclick="closeWelcomeNotification()">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<!-- Back to Top -->
<button id="backToTop" class="back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<style>
/* CSS Variables */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
    --text-dark: #2c3e50;
    --text-light: #6c757d;
    --white: #ffffff;
    --shadow-light: 0 5px 15px rgba(0,0,0,0.08);
    --shadow-medium: 0 10px 30px rgba(0,0,0,0.15);
    --shadow-heavy: 0 20px 40px rgba(0,0,0,0.2);
    --border-radius: 20px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
    color: var(--text-dark);
    overflow-x: hidden;
}

/* Page Loader */
.page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

.page-loader.hidden {
    opacity: 0;
    visibility: hidden;
}

.loader-content {
    text-align: center;
    color: white;
}

.loader-logo {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.loader-logo .logo-text {
    color: white;
    font-weight: 800;
    font-size: 2rem;
    font-family: 'Poppins', sans-serif;
}

.loader-text {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.loader-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-top: 3px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Reading Progress Bar */
.reading-progress-bar {
    position: fixed;
    top: 0;
    left: 0;
    width: 0%;
    height: 4px;
    background: var(--primary-gradient);
    z-index: 9999;
    transition: width 0.3s ease;
}

/* Navbar Styles */
.navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 15px 0;
    transition: var(--transition);
}

.navbar.scrolled {
    background: rgba(255, 255, 255, 0.98);
    padding: 10px 0;
    box-shadow: var(--shadow-light);
}

.brand-logo-container {
    margin-right: 12px;
}

.brand-logo {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-light);
    position: relative;
    overflow: hidden;
}

.brand-logo::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.brand-logo:hover::before {
    left: 100%;
}

.logo-text {
    color: white;
    font-weight: 800;
    font-size: 1.2rem;
    font-family: 'Poppins', sans-serif;
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.2;
}

.brand-tagline {
    font-size: 0.75rem;
    color: var(--text-light);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.navbar-toggler {
    border: none;
    padding: 4px 8px;
    position: relative;
    width: 30px;
    height: 30px;
}

.navbar-toggler span {
    display: block;
    width: 22px;
    height: 2px;
    background: var(--text-dark);
    margin: 4px 0;
    transition: var(--transition);
    border-radius: 2px;
}

.navbar-nav .nav-link {
    color: var(--text-dark) !important;
    font-weight: 600;
    padding: 8px 20px !important;
    margin: 0 5px;
    border-radius: 25px;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.navbar-nav .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    transition: var(--transition);
    z-index: -1;
}

.navbar-nav .nav-link:hover::before,
.navbar-nav .nav-link.active::before {
    left: 0;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: white !important;
    transform: translateY(-2px);
}

.btn-gradient {
    background: var(--primary-gradient);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    box-shadow: var(--shadow-light);
}

.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
    color: white;
}

.btn-outline-gradient {
    background: transparent;
    border: 2px solid;
    border-image: var(--primary-gradient) 1;
    color: var(--text-dark);
    padding: 8px 18px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.btn-outline-gradient::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    transition: var(--transition);
    z-index: -1;
}

.btn-outline-gradient:hover::before {
    left: 0;
}

.btn-outline-gradient:hover {
    color: white;
    border-color: transparent;
}

/* Hero Section */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding-top: 80px;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
}

.gradient-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--primary-gradient);
    opacity: 0.9;
}

.particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.shape {
    position: absolute;
    opacity: 0.1;
    animation: float 20s infinite linear;
}

.shape-1 {
    width: 100px;
    height: 100px;
    background: white;
    border-radius: 50%;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 30%;
    top: 60%;
    right: 15%;
    animation-delay: 5s;
}

.shape-3 {
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 20%;
    top: 70%;
    left: 70%;
    animation-delay: 10s;
}

.shape-4 {
    width: 120px;
    height: 120px;
    background: white;
    border-radius: 50%;
    top: 10%;
    right: 30%;
    animation-delay: 15s;
}

@keyframes float {
    0% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
    100% { transform: translateY(0px) rotate(360deg); }
}

/* Hero Content */
.hero-content {
    position: relative;
    z-index: 2;
    color: white;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    padding: 12px 24px;
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    margin-bottom: 2rem;
    transition: var(--transition);
}

.hero-badge:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

.badge-icon {
    width: 30px;
    height: 30px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
}

.badge-text {
    font-weight: 600;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
}

.welcome-message {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1rem;
    opacity: 0;
    animation: fadeInUp 1s ease 0.5s forwards;
}

.welcome-text {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.welcome-time {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.85rem;
    font-weight: 400;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-title {
    font-size: 4rem;
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    font-family: 'Poppins', sans-serif;
}

.text-gradient {
    background: linear-gradient(45deg, #ff9a9e, #fecfef, #fad0c4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.8rem;
    font-weight: 400;
    opacity: 0.9;
    display: block;
    margin-top: 0.5rem;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.7;
    opacity: 0.9;
    margin-bottom: 2.5rem;
    max-width: 90%;
}

.hero-features {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 3rem;
}

.feature-pill {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    padding: 12px 20px;
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: var(--transition);
}

.feature-pill:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-3px);
}

.feature-icon {
    width: 35px;
    height: 35px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-size: 0.9rem;
}

.hero-buttons {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.btn-hero-primary,
.btn-hero-secondary {
    display: inline-flex;
    align-items: center;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    text-decoration: none;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    border: none;
}

.btn-hero-primary {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-hero-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.3));
    transition: var(--transition);
    z-index: -1;
}

.btn-hero-primary:hover::before {
    left: 0;
}

.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    color: white;
}

.btn-hero-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-3px);
    color: white;
}

.btn-text {
    margin-right: 10px;
}

.btn-icon {
    width: 25px;
    height: 25px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.btn-hero-primary:hover .btn-icon,
.btn-hero-secondary:hover .btn-icon {
    background: rgba(255, 255, 255, 0.3);
    transform: translateX(3px);
}

/* Hero Visual */
.hero-visual {
    position: relative;
    height: 600px;
}

.dashboard-mockup {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 450px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
}

.mockup-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.mockup-dots {
    display: flex;
    gap: 8px;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.dot.red { background: #ff5f56; }
.dot.yellow { background: #ffbd2e; }
.dot.green { background: #27ca3f; }

.mockup-title {
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
}

.mockup-content {
    padding: 20px;
}

.chart-container {
    margin-bottom: 20px;
    height: 120px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stats-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.stat-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 8px;
    color: white;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.float-card {
    position: absolute;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    padding: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    text-align: center;
    animation: floatCard 6s ease-in-out infinite;
    width: 160px;
}

.card-1 {
    top: 10%;
    left: -10%;
    animation-delay: 0s;
}

.card-2 {
    top: 70%;
    right: -10%;
    animation-delay: 2s;
}

.card-3 {
    bottom: 10%;
    left: 20%;
    animation-delay: 4s;
}

.float-card .card-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
    font-size: 1.2rem;
}

.float-card h5 {
    font-size: 1rem;
    margin-bottom: 8px;
    font-weight: 600;
}

.float-card p {
    font-size: 0.8rem;
    opacity: 0.9;
    margin: 0;
}

@keyframes floatCard {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: white;
    cursor: pointer;
    transition: var(--transition);
}

.scroll-indicator:hover {
    transform: translateX(-50%) translateY(-5px);
}

.scroll-mouse {
    width: 25px;
    height: 40px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 15px;
    margin: 0 auto 10px;
    position: relative;
}

.scroll-wheel {
    width: 3px;
    height: 8px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 2px;
    position: absolute;
    top: 8px;
    left: 50%;
    transform: translateX(-50%);
    animation: scrollWheel 2s infinite;
}

@keyframes scrollWheel {
    0% { opacity: 1; top: 8px; }
    100% { opacity: 0; top: 22px; }
}

.scroll-indicator span {
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* Section Styles */
.about-section,
.contact-section {
    padding: 100px 0;
    background: #f8fafc;
    position: relative;
    overflow: hidden;
}

.about-section::before,
.contact-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 20%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.services-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    position: relative;
    overflow: hidden;
}

.services-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    background: var(--primary-gradient);
    color: white;
    padding: 8px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-light);
}

.badge-number {
    width: 30px;
    height: 30px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-weight: 700;
    font-size: 0.8rem;
}

.section-title {
    font-size: 3rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 1rem;
    line-height: 1.2;
    font-family: 'Poppins', sans-serif;
}

.services-section .section-title {
    color: white;
}

.title-highlight {
    display: block;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 400;
}

.section-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    margin-bottom: 3rem;
}

/* About Section */
.content-steps {
    margin-top: 2rem;
}

.step-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding: 1.5rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: var(--transition);
}

.step-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-medium);
    border-color: rgba(102, 126, 234, 0.2);
}

.step-number {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.2rem;
    margin-right: 1.5rem;
    flex-shrink: 0;
    box-shadow: var(--shadow-light);
}

.step-content h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.step-content p {
    color: var(--text-light);
    line-height: 1.6;
    margin: 0;
}

.about-stats-container {
    position: relative;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-box {
    background: white;
    padding: 2rem 1.5rem;
    border-radius: var(--border-radius);
    text-align: center;
    box-shadow: var(--shadow-light);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.stat-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    transform: scaleX(0);
    transition: var(--transition);
}

.stat-box:hover::before {
    transform: scaleX(1);
}

.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.stat-box .stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: block;
    margin-bottom: 0.5rem;
    font-family: 'Poppins', sans-serif;
}

.stat-box .stat-label {
    color: var(--text-light);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.about-image {
    position: relative;
}

.image-container {
    position: relative;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
    transition: var(--transition);
}

.image-container:hover {
    transform: translateY(-10px) scale(1.02);
}

.image-container img {
    width: 100%;
    height: auto;
    transition: var(--transition);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--primary-gradient);
    opacity: 0;
    transition: var(--transition);
}

.image-container:hover .image-overlay {
    opacity: 0.1;
}

.image-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 10px 16px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-dark);
    font-weight: 600;
    font-size: 0.85rem;
    box-shadow: var(--shadow-light);
}

.image-badge i {
    color: #f39c12;
}

/* Features Section */
.features-section {
    padding: 100px 0;
    background: #f8fafc;
    position: relative;
    overflow: hidden;
}

.features-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 20%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.feature-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 2.5rem 2rem;
    box-shadow: var(--shadow-light);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    transform: scaleX(0);
    transition: var(--transition);
}

.feature-card:hover::before {
    transform: scaleX(1);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-medium);
    border-color: rgba(102, 126, 234, 0.2);
}

.feature-card .feature-icon {
    width: 70px;
    height: 70px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.8rem;
    color: white;
    box-shadow: var(--shadow-light);
    transition: var(--transition);
}

.feature-card:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: var(--shadow-medium);
}

.feature-card h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
    text-align: center;
}

.feature-card p {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    text-align: center;
}

.feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-list li {
    padding: 0.5rem 0;
    color: var(--text-dark);
    font-weight: 500;
    position: relative;
    padding-left: 1.5rem;
}

.feature-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #48bb78;
    font-weight: bold;
    font-size: 1.1rem;
}

/* Technologies Section */
.technologies-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
    position: relative;
    overflow: hidden;
}

.technologies-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
    pointer-events: none;
}



/* Testimonials Section */
.testimonials-section {
    padding: 100px 0;
    background: #f8fafc;
    position: relative;
    overflow: hidden;
}

.testimonials-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 20%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.testimonial-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 2.5rem 2rem;
    box-shadow: var(--shadow-light);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.testimonial-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    transform: scaleX(0);
    transition: var(--transition);
}

.testimonial-card:hover::before {
    transform: scaleX(1);
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-medium);
    border-color: rgba(102, 126, 234, 0.2);
}

.quote-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: white;
    font-size: 1.2rem;
    box-shadow: var(--shadow-light);
}

.testimonial-text {
    color: var(--text-dark);
    line-height: 1.7;
    margin-bottom: 2rem;
    font-style: italic;
    text-align: center;
    font-size: 1rem;
}

.testimonial-author {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.author-avatar {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.author-info {
    flex: 1;
    min-width: 0;
}

.author-info h5 {
    color: var(--text-dark);
    font-weight: 700;
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
}

.author-info span {
    color: var(--text-light);
    font-size: 0.85rem;
    font-weight: 500;
}

.rating {
    display: flex;
    gap: 2px;
    color: #fbbf24;
    font-size: 0.9rem;
}

.testimonial-stats {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 3rem;
    margin-top: 2rem;
}

.stat-item-small {
    text-align: center;
    color: var(--text-dark);
}

.stat-number-small {
    font-size: 2rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
    font-family: 'Poppins', sans-serif;
    transition: transform 0.2s ease;
}

.stat-label-small {
    color: var(--text-light);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Live Stats Section */
.live-stats-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
    position: relative;
    overflow: hidden;
}

.live-stats-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.stat-item {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--border-radius);
    padding: 2rem;
    color: white;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.stat-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: var(--transition);
}

.stat-item:hover::before {
    left: 100%;
}

.stat-item:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.stat-item .stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    font-size: 1.5rem;
    transition: var(--transition);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.stat-item:hover .stat-icon {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
    border-color: rgba(255, 255, 255, 0.4);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: white;
    margin-bottom: 0.5rem;
    font-family: 'Poppins', sans-serif;
}

.stat-label {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 1rem;
}

.stat-change {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    font-weight: 500;
}

.stat-change.positive {
    color: #48bb78;
}

.stat-change.negative {
    color: #f56565;
}

.stat-change i {
    font-size: 0.8rem;
}

.performance-indicators {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 3rem;
    margin-top: 2rem;
}

.indicator {
    text-align: center;
    color: white;
}

.indicator-circle {
    position: relative;
    width: 100px;
    height: 100px;
    margin: 0 auto 1rem;
}

.circular-chart {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.circle-bg {
    fill: none;
    stroke: rgba(255, 255, 255, 0.1);
    stroke-width: 3;
}

.circle {
    fill: none;
    stroke: #667eea;
    stroke-width: 3;
    stroke-linecap: round;
    animation: progress 1s ease-out forwards;
}

@keyframes progress {
    0% {
        stroke-dasharray: 0 100;
    }
}

.indicator-value {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 1.2rem;
    font-weight: 700;
    color: white;
}

.indicator-label {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

/* CTA Section */
.cta-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.cta-content {
    position: relative;
    z-index: 2;
    color: white;
}

.cta-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Poppins', sans-serif;
}

.cta-description {
    font-size: 1.2rem;
    line-height: 1.7;
    opacity: 0.9;
    margin-bottom: 3rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.btn-cta-primary,
.btn-cta-secondary {
    display: inline-flex;
    align-items: center;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    text-decoration: none;
    transition: var(--transition);
    border: none;
    gap: 10px;
}

.btn-cta-primary {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-cta-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    color: white;
    background: rgba(255, 255, 255, 0.3);
}

.btn-cta-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.btn-cta-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-3px);
    color: white;
}

.cta-features {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.cta-feature {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    font-size: 0.9rem;
}

.cta-feature i {
    color: #48bb78;
    font-size: 1rem;
}

/* Quick Access Section */
.quick-access-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
    position: relative;
    overflow: hidden;
}

.quick-access-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 30%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.access-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--border-radius);
    padding: 2.5rem 2rem;
    text-align: center;
    color: white;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    height: 100%;
}

.access-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: var(--transition);
}

.access-card:hover::before {
    left: 100%;
}

.access-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.access-card .card-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    transition: var(--transition);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.access-card:hover .card-icon {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
    border-color: rgba(255, 255, 255, 0.4);
}

.access-card h4 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: white;
}

.access-card p {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.card-features {
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.8rem;
    padding: 0.5rem 0;
}

.feature-item i {
    color: #48bb78;
    margin-right: 12px;
    font-size: 0.9rem;
    width: 20px;
}

.feature-item span {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
    font-weight: 500;
}

.btn-access-primary,
.btn-access-secondary {
    display: inline-flex;
    align-items: center;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    border: none;
    width: 100%;
    justify-content: center;
    gap: 10px;
}

.btn-access-primary {
    background: var(--primary-gradient);
    color: white;
}

.btn-access-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    color: white;
}

.btn-access-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.btn-access-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
    color: white;
}

.system-info {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 2rem;
}

.info-item {
    display: flex;
    align-items: center;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
    font-size: 0.9rem;
}

.info-item i {
    margin-right: 8px;
    color: #667eea;
    font-size: 1rem;
}

.access-note {
    margin-top: 1rem;
    padding: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
}

.access-note i {
    color: #fbbf24;
    font-size: 0.9rem;
}


/* Custom Send Message Button */
.btn-send-message {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    gap: 12px;
}

.btn-send-message::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-send-message:hover::before {
    left: 100%;
}

.btn-send-message:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
}

.btn-send-message:active {
    transform: translateY(-1px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-send-message .btn-text {
    font-weight: 700;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.btn-send-message .btn-icon {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.btn-send-message:hover .btn-icon {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1) rotate(15deg);
}

/* Contact Section */
.contact-form-container {
    background: white;
    padding: 3rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-medium);
    margin-bottom: 3rem;
    border: 1px solid rgba(102, 126, 234, 0.1);
    position: relative;
    overflow: hidden;
}

.contact-form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 1rem;
    transition: var(--transition);
    background: #f8fafc;
    font-family: inherit;
}

.form-control:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    transform: translateY(-2px);
}

.contact-info {
    margin-top: 3rem;
}

.contact-item {
    text-align: center;
    padding: 2rem 1.5rem;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: var(--transition);
    height: 100%;
}

.contact-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
    border-color: rgba(102, 126, 234, 0.2);
}

.contact-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.5rem;
    box-shadow: var(--shadow-light);
}

.contact-item h5 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.contact-item p {
    color: var(--text-light);
    margin: 0;
    font-weight: 500;
}

/* Footer */
.footer {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    color: white;
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
}

.footer-brand {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
}

.footer-brand .brand-logo {
    margin-right: 12px;
}

.footer-brand .brand-name {
    color: white;
}

.footer-description {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.social-links {
    display: flex;
    gap: 12px;
}

.social-link {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: var(--transition);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.social-link:hover {
    background: var(--primary-gradient);
    transform: translateY(-3px);
    color: white;
    border-color: transparent;
    box-shadow: var(--shadow-light);
}

.footer h5 {
    color: white;
    font-weight: 700;
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 0.8rem;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: var(--transition);
    font-weight: 500;
}

.footer-links a:hover {
    color: white;
    transform: translateX(5px);
}

.footer-contact p {
    display: flex;
    align-items: center;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 0.8rem;
    font-weight: 500;
}

.footer-contact i {
    width: 20px;
    margin-right: 12px;
    color: #667eea;
}

.footer-divider {
    border: none;
    height: 1px;
    background: rgba(255, 255, 255, 0.1);
    margin: 2rem 0 1.5rem;
}

.copyright,
.legal-links {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.9rem;
}

.legal-links a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: var(--transition);
}

.legal-links a:hover {
    color: white;
}

/* Welcome Notification */
.welcome-notification {
    position: fixed;
    top: 100px;
    right: 20px;
    background: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-heavy);
    border: 1px solid rgba(102, 126, 234, 0.1);
    z-index: 10000;
    transform: translateX(400px);
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    max-width: 350px;
}

.welcome-notification.show {
    transform: translateX(0);
}

.notification-content {
    display: flex;
    align-items: flex-start;
    padding: 1.5rem;
    gap: 1rem;
}

.notification-icon {
    width: 40px;
    height: 40px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.notification-text h5 {
    color: var(--text-dark);
    font-weight: 700;
    margin: 0 0 0.5rem 0;
    font-size: 1rem;
}

.notification-text p {
    color: var(--text-light);
    margin: 0;
    font-size: 0.9rem;
    line-height: 1.4;
}

.notification-close {
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: var(--transition);
    flex-shrink: 0;
}

.notification-close:hover {
    background: rgba(102, 126, 234, 0.1);
    color: var(--text-dark);
}

/* Success Message */
.success-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #48bb78, #38a169);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-medium);
    z-index: 10001;
    transform: translateX(400px);
    transition: transform 0.3s ease;
}

.success-message.show {
    transform: translateX(0);
}

.success-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.success-content i {
    font-size: 1.2rem;
}

.success-content span {
    font-weight: 600;
    font-size: 0.9rem;
}

/* Back to Top */
.back-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: var(--transition);
    z-index: 1000;
    box-shadow: var(--shadow-medium);
    display: flex;
    align-items: center;
    justify-content: center;
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top:hover {
    transform: translateY(-3px) scale(1.1);
    box-shadow: var(--shadow-heavy);
}

/* Animations */
.animate-in {
    opacity: 1 !important;
    transform: translateY(0) !important;
}

/* Responsive Design */
@media (max-width: 1199.98px) {
    .hero-title {
        font-size: 3.5rem;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 991.98px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-description {
        font-size: 1.1rem;
    }
    
    .section-title {
        font-size: 2.25rem;
    }
    
    .floating-elements {
        display: none;
    }
    
    .dashboard-mockup {
        width: 100%;
        max-width: 400px;
    }
    
    .hero-features {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .features-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .stats-container {
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }
    
    .testimonials-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 767.98px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.4rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-hero-primary,
    .btn-hero-secondary {
        width: 100%;
        justify-content: center;
    }
    
    .dashboard-mockup {
        position: relative;
        transform: none;
        margin-top: 2rem;
    }
    
    .contact-form-container {
        padding: 2rem 1.5rem;
    }
    
    .step-item {
        flex-direction: column;
        text-align: center;
    }
    
    .step-number {
        margin-right: 0;
        margin-bottom: 1rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-container {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .performance-indicators {
        flex-direction: column;
        gap: 2rem;
    }
    
    .testimonials-grid {
        grid-template-columns: 1fr;
    }
    
    .testimonial-stats {
        flex-direction: column;
        gap: 2rem;
    }
    
    .cta-title {
        font-size: 2.5rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        gap: 1rem;
    }
    
    .cta-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .welcome-notification {
        right: 10px;
        left: 10px;
        max-width: none;
    }
    
    .success-message {
        right: 10px;
        left: 10px;
    }
    
    .btn-send-message {
        padding: 12px 30px;
        font-size: 1rem;
    }
    
    .hero-visual {
        height: auto;
        margin-top: 3rem;
    }
    
    .system-info {
        flex-direction: column;
        gap: 1rem;
    }
    
    .access-card {
        padding: 2rem 1.5rem;
    }
}

@media (max-width: 575.98px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
    }
    
    .section-title {
        font-size: 1.75rem;
    }
    
    .hero-features {
        gap: 0.75rem;
    }
    
    .feature-pill {
        font-size: 0.85rem;
        padding: 10px 16px;
    }
    
    .about-section,
    .services-section,
    .contact-section {
        padding: 60px 0;
    }
    
    .navbar {
        padding: 10px 0;
    }
    
    .brand-name {
        font-size: 1.1rem;
    }
    
    .brand-tagline {
        font-size: 0.7rem;
    }
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-gradient);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
}

/* Loading Animation */
@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

.loading {
    animation: pulse 2s infinite;
}

/* Smooth Transitions */
* {
    scroll-behavior: smooth;
}

/* Selection Color */
::selection {
    background: rgba(102, 126, 234, 0.3);
    color: var(--text-dark);
}

::-moz-selection {
    background: rgba(102, 126, 234, 0.3);
    color: var(--text-dark);
}
</style>

<script>
// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            this.classList.add('active');
        }
    });
});

// Scroll indicator click
document.querySelector('.scroll-indicator')?.addEventListener('click', function() {
    document.querySelector('#about').scrollIntoView({
        behavior: 'smooth'
    });
});

// Back to top functionality
const backToTop = document.getElementById('backToTop');

window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

backToTop.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Counter animation for statistics
function animateCounters() {
    const counters = document.querySelectorAll('[data-count]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const increment = target / 100;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current);
                setTimeout(updateCounter, 20);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });
}

// Animate circular progress bars
function animateProgressBars() {
    const circles = document.querySelectorAll('.circle');
    
    circles.forEach(circle => {
        const strokeDasharray = circle.getAttribute('stroke-dasharray');
        const [progress] = strokeDasharray.split(',').map(Number);
        
        circle.style.strokeDasharray = `0 100`;
        
        setTimeout(() => {
            circle.style.strokeDasharray = strokeDasharray;
        }, 500);
    });
}

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            
            // Trigger counter animation for stats
            if (entry.target.querySelector('[data-count]')) {
                setTimeout(animateCounters, 500);
            }
            
            // Trigger progress bar animation
            if (entry.target.querySelector('.circular-chart')) {
                setTimeout(animateProgressBars, 1000);
            }
        }
    });
}, observerOptions);

// Observe elements for animation
document.querySelectorAll('.step-item, .stat-box, .contact-item, .about-image, .feature-card, .stat-item, .testimonial-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// Create particles effect
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const particlesCount = 50;
    
    for (let i = 0; i < particlesCount; i++) {
        const particle = document.createElement('div');
        particle.style.cssText = `
            position: absolute;
            width: ${Math.random() * 4 + 2}px;
            height: ${Math.random() * 4 + 2}px;
            background: rgba(255, 255, 255, ${Math.random() * 0.5 + 0.2});
            border-radius: 50%;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation: floatParticles ${Math.random() * 10 + 10}s linear infinite;
            animation-delay: ${Math.random() * 10}s;
        `;
        particlesContainer.appendChild(particle);
    }
}

// Add particles animation CSS
const particleStyle = document.createElement('style');
particleStyle.textContent = `
    @keyframes floatParticles {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) rotate(360deg);
            opacity: 0;
        }
    }
`;
document.head.appendChild(particleStyle);

// Initialize particles
createParticles();

// Demo chart for dashboard mockup
function createDemoChart() {
    const canvas = document.getElementById('demoChart');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        canvas.width = 400;
        canvas.height = 120;
        
        // Simple line chart
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.8)';
        ctx.lineWidth = 2;
        ctx.beginPath();
        
        const points = [30, 45, 35, 55, 65, 45, 70, 85, 75, 90];
        const width = canvas.width;
        const height = canvas.height;
        
        points.forEach((point, index) => {
            const x = (index / (points.length - 1)) * width;
            const y = height - (point / 100) * height;
            
            if (index === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        });
        
        ctx.stroke();
        
        // Add gradient under the line
        ctx.lineTo(width, height);
        ctx.lineTo(0, height);
        ctx.closePath();
        
        const gradient = ctx.createLinearGradient(0, 0, 0, height);
        gradient.addColorStop(0, 'rgba(255, 255, 255, 0.3)');
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0.05)');
        
        ctx.fillStyle = gradient;
        ctx.fill();
    }
}

// Initialize demo chart
createDemoChart();

// Form submission handling
document.querySelector('.contact-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalContent = submitBtn.innerHTML;
    
    // Loading state
    submitBtn.innerHTML = `
        <span class="btn-text">Envoi en cours...</span>
        <span class="btn-icon"><i class="fas fa-spinner fa-spin"></i></span>
    `;
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        submitBtn.innerHTML = `
            <span class="btn-text">Message envoyé!</span>
            <span class="btn-icon"><i class="fas fa-check"></i></span>
        `;
        submitBtn.style.background = 'linear-gradient(135deg, #48bb78, #38a169)';
        
        // Show success message
        showSuccessMessage('Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
        
        // Reset form
        this.reset();
        
        // Reset button after 3 seconds
        setTimeout(() => {
            submitBtn.innerHTML = originalContent;
            submitBtn.style.background = '';
            submitBtn.disabled = false;
        }, 3000);
    }, 2000);
});

// Success message function
function showSuccessMessage(message) {
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.innerHTML = `
        <div class="success-content">
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(successDiv);
    
    // Show message
    setTimeout(() => {
        successDiv.classList.add('show');
    }, 100);
    
    // Hide message after 5 seconds
    setTimeout(() => {
        successDiv.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(successDiv);
        }, 300);
    }, 5000);
}

// Navbar mobile toggle enhancement
document.querySelector('.navbar-toggler')?.addEventListener('click', function() {
    this.classList.toggle('active');
});

// Add active class styles for mobile toggle
const toggleStyle = document.createElement('style');
toggleStyle.textContent = `
    .navbar-toggler.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }
    .navbar-toggler.active span:nth-child(2) {
        opacity: 0;
    }
    .navbar-toggler.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }
`;
document.head.appendChild(toggleStyle);

// Parallax effect for hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const rate = scrolled * -0.5;
    
    const shapes = document.querySelectorAll('.floating-shapes .shape');
    shapes.forEach((shape, index) => {
        const speed = 0.5 + (index * 0.1);
        shape.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Add loading state for page
window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});

// Enhanced scroll indicator
const scrollIndicator = document.querySelector('.scroll-indicator');
if (scrollIndicator) {
    window.addEventListener('scroll', function() {
        const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        
        if (scrollPercent > 10) {
            scrollIndicator.style.opacity = '0';
            scrollIndicator.style.transform = 'translateX(-50%) translateY(20px)';
        } else {
            scrollIndicator.style.opacity = '1';
            scrollIndicator.style.transform = 'translateX(-50%) translateY(0)';
        }
    });
}

// Smooth reveal animation for sections
function revealOnScroll() {
    const sections = document.querySelectorAll('section');
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const windowHeight = window.innerHeight;
        const scrollY = window.scrollY;
        
        if (scrollY + windowHeight > sectionTop + sectionHeight * 0.3) {
            section.classList.add('revealed');
        }
    });
}

// Add reveal animation CSS
const revealStyle = document.createElement('style');
revealStyle.textContent = `
    section {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease, transform 1s ease;
    }
    
    section.revealed {
        opacity: 1;
        transform: translateY(0);
    }
    
    section:first-child {
        opacity: 1;
        transform: translateY(0);
    }
`;
document.head.appendChild(revealStyle);

// Initialize reveal animation
window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

// Reading progress bar
function updateReadingProgress() {
    const progressBar = document.getElementById('readingProgressBar');
    const scrollTop = window.pageYOffset;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    progressBar.style.width = scrollPercent + '%';
}

window.addEventListener('scroll', updateReadingProgress);
window.addEventListener('load', updateReadingProgress);

// Welcome message with current time
function updateWelcomeTime() {
    const welcomeTime = document.getElementById('welcomeTime');
    if (welcomeTime) {
        const now = new Date();
        const timeString = now.toLocaleTimeString('fr-FR', {
            hour: '2-digit',
            minute: '2-digit'
        });
        welcomeTime.textContent = `Il est ${timeString}`;
    }
}

// Update time every minute
setInterval(updateWelcomeTime, 60000);
updateWelcomeTime(); // Initial call

// Simulate real-time visitor counter
function updateVisitorCount() {
    const visitorCount = document.getElementById('visitorCount');
    if (visitorCount) {
        const currentCount = parseInt(visitorCount.textContent);
        const newCount = currentCount + Math.floor(Math.random() * 3) - 1; // Random change between -1 and +1
        const finalCount = Math.max(1, newCount); // Ensure count doesn't go below 1
        visitorCount.textContent = finalCount;
        
        // Add a subtle animation
        visitorCount.style.transform = 'scale(1.1)';
        setTimeout(() => {
            visitorCount.style.transform = 'scale(1)';
        }, 200);
    }
}

// Update visitor count every 5 seconds
setInterval(updateVisitorCount, 5000);

// Time spent counter
function updateTimeSpent() {
    const timeSpentElement = document.getElementById('timeSpent');
    if (timeSpentElement) {
        const startTime = sessionStorage.getItem('pageStartTime') || Date.now();
        if (!sessionStorage.getItem('pageStartTime')) {
            sessionStorage.setItem('pageStartTime', startTime);
        }
        
        const currentTime = Date.now();
        const timeDiff = currentTime - startTime;
        const minutes = Math.floor(timeDiff / 60000);
        
        timeSpentElement.textContent = minutes;
    }
}

// Update time spent every minute
setInterval(updateTimeSpent, 60000);
updateTimeSpent(); // Initial call

// Welcome notification
function showWelcomeNotification() {
    const notification = document.getElementById('welcomeNotification');
    if (notification) {
        setTimeout(() => {
            notification.classList.add('show');
        }, 2000); // Show after 2 seconds
    }
}

function closeWelcomeNotification() {
    const notification = document.getElementById('welcomeNotification');
    if (notification) {
        notification.classList.remove('show');
    }
}

// Show welcome notification on page load
window.addEventListener('load', showWelcomeNotification);

// Hide page loader when page is fully loaded
window.addEventListener('load', function() {
    const pageLoader = document.getElementById('pageLoader');
    if (pageLoader) {
        setTimeout(() => {
            pageLoader.classList.add('hidden');
        }, 1000); // Hide after 1 second
    }
});

// Section highlight on scroll
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        if (window.scrollY >= sectionTop) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});
</script>

</body>
</html>