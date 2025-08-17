@extends('layouts.main')

@section('title')
Système de gestion des employés | Login
@endsection

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        {{-- Logo + Nom --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('vendor/adminlte/dist/img/Marsa-Maroc.png') }}" alt="Logo" width="40" height="40" class="me-2">
            <span class="fw-bold fs-5">OG Manage</span>
        </a>

        {{-- Bouton menu mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Liens --}}
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item mx-2">
                    <a class="nav-link d-flex align-items-center" href="{{ url('/') }}">
                        <i class="fas fa-home fa-lg me-1"></i>
                        <span class="fs-6">Accueil</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Background avec pattern géométrique -->
<div class="login-wrapper">
    <div class="geometric-bg"></div>
    
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 max-width-container">
            <!-- Section gauche avec branding -->
            <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center branding-section">
                <div class="branding-content text-center">
                    <div class="logo-container mb-4">
                        <img src="{{ asset('vendor/adminlte/dist/img/og.png') }}" 
                             class="brand-logo" 
                             alt="OG Manage">
                    </div>
                    <h2 class="brand-title mb-3">Bienvenue sur OG Manage</h2>
                    <p class="brand-subtitle">Système moderne de gestion des employés</p>
                    <div class="features-list mt-4">
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Sécurisé et fiable</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Tableau de bord avancé</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <span>Gestion complète RH</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section droite avec formulaire -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="login-form-container">
                    <div class="login-card">
                        <div class="card-header-custom">
                            <div class="header-icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <h3 class="login-title">Connexion</h3>
                            <p class="login-subtitle">Accédez à votre espace professionnel</p>
                        </div>

                        <div class="card-body-custom">
                            <form method="POST" action="{{ route('login') }}" class="login-form">
                                @csrf

                                <div class="form-group-custom mb-4">
                                    <label for="email" class="form-label-custom">
                                        <i class="fas fa-envelope me-2"></i>Adresse e-mail
                                    </label>
                                    <div class="input-wrapper">
                                        <input id="email" type="email"
                                               class="form-control-custom @error('email') is-invalid @enderror"
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               required 
                                               autocomplete="off" 
                                               autofocus
                                               placeholder="exemple@entreprise.com">
                                        <div class="input-focus-line"></div>
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback-custom">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group-custom mb-4">
                                    <label for="password" class="form-label-custom">
                                        <i class="fas fa-lock me-2"></i>Mot de passe
                                    </label>
                                    <div class="input-wrapper position-relative">
                                        <input id="password" type="password"
                                               class="form-control-custom @error('password') is-invalid @enderror"
                                               name="password" 
                                               required 
                                               autocomplete="off"
                                               placeholder="Votre mot de passe">
                                        <button type="button" class="password-toggle" onclick="togglePassword()">
                                            <i class="fas fa-eye" id="toggleIcon"></i>
                                        </button>
                                        <div class="input-focus-line"></div>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback-custom">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-options mb-4">
                                    <div class="remember-me">
                                        <input type="checkbox" id="remember" name="remember" class="custom-checkbox">
                                        <label for="remember" class="checkbox-label">Se souvenir de moi</label>
                                    </div>
                                    <a href="#" class="forgot-password-link">Mot de passe oublié ?</a>
                                </div>

                                <button type="submit" class="btn-login-custom w-100">
                                    <span class="btn-content">
                                        <i class="fas fa-sign-in-alt me-2"></i>
                                        Se connecter
                                    </span>
                                    <div class="btn-loader">
                                        <div class="spinner"></div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Footer info -->
                    <div class="login-footer text-center mt-4">
                        <p class="footer-text">© 2024 OG Manage. Tous droits réservés.</p>
                        <div class="footer-links">
                            <a href="#">Aide</a>
                            <span>•</span>
                            <a href="#">Confidentialité</a>
                            <span>•</span>
                            <a href="#">Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Variables CSS */
:root {
    --primary-color: #2c3e50;
    --secondary-color: #3498db;
    --accent-color: #e74c3c;
    --success-color: #27ae60;
    --warning-color: #f39c12;
    --dark-color: #34495e;
    --light-gray: #ecf0f1;
    --medium-gray: #bdc3c7;
    --text-dark: #2c3e50;
    --text-light: #7f8c8d;
    --white: #ffffff;
    --shadow-light: rgba(0, 0, 0, 0.1);
    --shadow-medium: rgba(0, 0, 0, 0.15);
    --shadow-dark: rgba(0, 0, 0, 0.3);
    --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

/* Reset et base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: var(--light-gray);
    color: var(--text-dark);
    line-height: 1.6;
}

/* Background wrapper */
.login-wrapper {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
}

.geometric-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    opacity: 0.05;
    z-index: -1;
}

.geometric-bg::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background-image: 
        linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 41%, rgba(255,255,255,0.1) 59%, transparent 60%),
        linear-gradient(-45deg, transparent 40%, rgba(255,255,255,0.05) 41%, rgba(255,255,255,0.05) 59%, transparent 60%);
    background-size: 60px 60px;
    animation: moveBackground 20s linear infinite;
}

@keyframes moveBackground {
    0% { transform: translate(0, 0); }
    100% { transform: translate(60px, 60px); }
}

/* Container principal */
.max-width-container {
    max-width: 1400px;
    margin: 0 auto;
}

/* Section branding */
.branding-section {
    padding: 60px 40px;
    background: var(--gradient-primary);
    color: var(--white);
    position: relative;
}

.branding-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.branding-content {
    position: relative;
    z-index: 2;
    max-width: 500px;
}

.logo-container {
    animation: fadeInUp 0.8s ease-out;
}

.brand-logo {
    width: 120px;
    height: 120px;
    object-fit: contain;
    filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
    transition: transform 0.3s ease;
}

.brand-logo:hover {
    transform: scale(1.05) rotate(2deg);
}

.brand-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.brand-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 2rem;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.features-list {
    animation: fadeInUp 0.8s ease-out 0.6s both;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 0.5rem 0;
    opacity: 0.9;
    transition: all 0.3s ease;
}

.feature-item:hover {
    opacity: 1;
    transform: translateX(10px);
}

.feature-item i {
    font-size: 1.2rem;
    margin-right: 1rem;
    width: 24px;
    color: rgba(255, 255, 255, 0.8);
}

/* Container formulaire */
.login-form-container {
    padding: 40px;
    width: 100%;
    max-width: 480px;
}

.login-card {
    background: var(--white);
    border-radius: 24px;
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.1),
        0 8px 25px rgba(0, 0, 0, 0.08),
        0 0 0 1px rgba(255, 255, 255, 0.05);
    overflow: hidden;
    position: relative;
    animation: slideInRight 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.login-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

/* En-tête du formulaire */
.card-header-custom {
    padding: 40px 40px 30px;
    text-align: center;
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.header-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    animation: pulse 2s infinite;
}

.header-icon i {
    font-size: 2rem;
    color: var(--white);
}

.login-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 8px;
}

.login-subtitle {
    color: var(--text-light);
    font-size: 0.95rem;
    margin: 0;
}

/* Corps du formulaire */
.card-body-custom {
    padding: 30px 40px 40px;
}

.form-group-custom {
    position: relative;
}

.form-label-custom {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.input-wrapper {
    position: relative;
    margin-bottom: 8px;
}

.form-control-custom {
    width: 100%;
    padding: 16px 20px;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 1rem;
    background: #fafbfc;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    outline: none;
    position: relative;
    z-index: 1;
}

.form-control-custom:focus {
    border-color: var(--secondary-color);
    background: var(--white);
    box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
    transform: translateY(-2px);
}

.form-control-custom.is-invalid {
    border-color: var(--accent-color);
}

.input-focus-line {
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 3px;
    background: var(--gradient-accent);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    transform: translateX(-50%);
    border-radius: 2px;
}

.form-control-custom:focus + .input-focus-line {
    width: 100%;
}

/* Bouton toggle password */
.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    z-index: 2;
    padding: 5px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.password-toggle:hover {
    background: rgba(52, 152, 219, 0.1);
    color: var(--secondary-color);
}

/* Messages d'erreur */
.invalid-feedback-custom {
    display: block;
    color: var(--accent-color);
    font-size: 0.875rem;
    margin-top: 5px;
    font-weight: 500;
    animation: slideDown 0.3s ease;
}

/* Options du formulaire */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.remember-me {
    display: flex;
    align-items: center;
}

.custom-checkbox {
    appearance: none;
    width: 18px;
    height: 18px;
    border: 2px solid #cbd5e0;
    border-radius: 4px;
    margin-right: 8px;
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
}

.custom-checkbox:checked {
    background: var(--secondary-color);
    border-color: var(--secondary-color);
}

.custom-checkbox:checked::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.checkbox-label {
    font-size: 0.9rem;
    color: var(--text-dark);
    cursor: pointer;
    user-select: none;
}

.forgot-password-link {
    color: var(--secondary-color);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.forgot-password-link:hover {
    color: var(--accent-color);
    text-decoration: underline;
}

/* Bouton de connexion */
.btn-login-custom {
    width: 100%;
    padding: 16px 24px;
    background: var(--gradient-primary);
    border: none;
    border-radius: 12px;
    color: var(--white);
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-login-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
}

.btn-login-custom:active {
    transform: translateY(-1px);
}

.btn-content {
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.3s ease;
}

.btn-loader {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Footer */
.login-footer {
    margin-top: 2rem;
    animation: fadeInUp 1s ease-out 0.8s both;
}

.footer-text {
    color: var(--text-light);
    font-size: 0.85rem;
    margin-bottom: 0.5rem;
}

.footer-links {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.footer-links a {
    color: var(--text-light);
    text-decoration: none;
    font-size: 0.85rem;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: var(--secondary-color);
}

.footer-links span {
    color: var(--medium-gray);
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

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .branding-section {
        padding: 40px 30px;
    }
    
    .brand-title {
        font-size: 2.2rem;
    }
}

@media (max-width: 992px) {
    .login-form-container {
        padding: 20px;
    }
    
    .card-header-custom,
    .card-body-custom {
        padding: 30px 25px;
    }
    
    .brand-title {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .login-wrapper {
        padding: 20px 0;
    }
    
    .login-form-container {
        padding: 15px;
    }
    
    .card-header-custom {
        padding: 25px 20px 20px;
    }
    
    .card-body-custom {
        padding: 20px;
    }
    
    .header-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
    }
    
    .header-icon i {
        font-size: 1.5rem;
    }
    
    .login-title {
        font-size: 1.5rem;
    }
    
    .form-options {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .forgot-password-link {
        margin-top: 0.5rem;
    }
}

@media (max-width: 480px) {
    .login-card {
        border-radius: 16px;
        margin: 10px;
    }
    
    .form-control-custom {
        padding: 14px 16px;
    }
    
    .btn-login-custom {
        padding: 14px 20px;
        font-size: 1rem;
    }
}

/* Améliorations navbar existante */
.navbar .nav-link {
    padding-top: 10px;
    padding-bottom: 10px;
    transition: all 0.3s ease;
}

.navbar .nav-link:hover {
    color: var(--secondary-color) !important;
    transform: translateY(-1px);
}

.navbar .nav-link i {
    position: relative;
    top: 1px;
}

.navbar-brand:hover {
    transform: scale(1.02);
}

/* États de focus pour l'accessibilité */
.btn-login-custom:focus,
.form-control-custom:focus,
.custom-checkbox:focus,
.password-toggle:focus {
    outline: 2px solid var(--secondary-color);
    outline-offset: 2px;
}

/* Mode sombre (optionnel) */
@media (prefers-color-scheme: dark) {
    :root {
        --white: #1a202c;
        --light-gray: #2d3748;
        --text-dark: #e2e8f0;
        --text-light: #a0aec0;
    }
    
    .login-card {
        background: var(--white);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }
    
    .form-control-custom {
        background: #2d3748;
        border-color: #4a5568;
        color: var(--text-dark);
    }
    
    .form-control-custom:focus {
        background: #1a202c;
    }
}
</style>

<script>
// Toggle password visibility
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.className = 'fas fa-eye-slash';
    } else {
        passwordInput.type = 'password';
        toggleIcon.className = 'fas fa-eye';
    }
}

// Animation du bouton lors de la soumission
document.querySelector('.login-form').addEventListener('submit', function(e) {
    const button = document.querySelector('.btn-login-custom');
    const btnContent = button.querySelector('.btn-content');
    const btnLoader = button.querySelector('.btn-loader');
    
    button.disabled = true;
    btnContent.style.opacity = '0';
    btnLoader.style.opacity = '1';
    
    // Simuler le chargement (remplacez par votre logique réelle)
    setTimeout(() => {
        button.disabled = false;
        btnContent.style.opacity = '1';
        btnLoader.style.opacity = '0';
    }, 3000);
});

// Animation d'entrée séquentielle
window.addEventListener('load', function() {
    const elements = document.querySelectorAll('.form-group-custom');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s forwards`;
    });
});

// Validation en temps réel
document.getElementById('email').addEventListener('input', function(e) {
    const email = e.target;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (emailRegex.test(email.value)) {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
    } else if (email.value.length > 0) {
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
    } else {
        email.classList.remove('is-valid', 'is-invalid');
    }
});

// Parallax léger pour l'arrière-plan
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const bg = document.querySelector('.geometric-bg');
    if (bg) {
        bg.style.transform = `translateY(${scrolled * 0.2}px)`;
    }
});

// Préchargement des images pour une meilleure performance
window.addEventListener('load', function() {
    const images = [
        "{{ asset('vendor/adminlte/dist/img/Marsa-Maroc.png') }}",
        "{{ asset('vendor/adminlte/dist/img/og.png') }}"
    ];
    
    images.forEach(src => {
        const img = new Image();
        img.src = src;
    });
});
</script>

@endsection