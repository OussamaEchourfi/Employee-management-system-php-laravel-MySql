<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpgradeBladeDesigns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:blade-designs {--type=all : Type of files to upgrade (all, index, create, edit, show)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upgrade all blade files with modern design';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type = $this->option('type');
        $this->info("Starting blade design upgrade for type: {$type}");

        $directories = ['servicess', 'conges', 'attestations'];
        
        foreach ($directories as $directory) {
            $this->info("Processing directory: {$directory}");
            
            $viewsPath = resource_path("views/{$directory}");
            
            if (!File::exists($viewsPath)) {
                $this->warn("Directory {$viewsPath} does not exist, skipping...");
                continue;
            }

            $files = File::files($viewsPath);
            
            foreach ($files as $file) {
                $filename = $file->getFilename();
                $fileType = $this->getFileType($filename);
                
                if ($type === 'all' || $type === $fileType) {
                    $this->upgradeFile($file->getPathname(), $directory, $fileType);
                }
            }
        }

        $this->info('Blade design upgrade completed!');
        return 0;
    }

    private function getFileType($filename)
    {
        if (str_contains($filename, 'index.blade.php')) return 'index';
        if (str_contains($filename, 'create.blade.php')) return 'create';
        if (str_contains($filename, 'edit.blade.php')) return 'edit';
        if (str_contains($filename, 'show.blade.php')) return 'show';
        return 'other';
    }

    private function upgradeFile($filepath, $directory, $type)
    {
        $this->info("Upgrading {$filepath} ({$type})");
        
        $content = File::get($filepath);
        
        // Apply modern design based on file type
        switch ($type) {
            case 'index':
                $content = $this->upgradeIndexFile($content, $directory);
                break;
            case 'create':
                $content = $this->upgradeCreateFile($content, $directory);
                break;
            case 'edit':
                $content = $this->upgradeEditFile($content, $directory);
                break;
            case 'show':
                $content = $this->upgradeShowFile($content, $directory);
                break;
        }
        
        File::put($filepath, $content);
        $this->info("✓ Upgraded {$filepath}");
    }

    private function upgradeIndexFile($content, $directory)
    {
        // Add modern header and stats cards
        $modernHeader = $this->getModernHeader($directory, 'Liste');
        $modernStats = $this->getModernStats($directory);
        $modernTable = $this->getModernTable($directory);
        $modernCSS = $this->getModernCSS($directory);
        $modernJS = $this->getModernJS($directory);
        
        // Replace old content with modern design
        $content = preg_replace('/<div class="row">\s*<div class="col-md-10 mx-auto">/s', 
            '<div class="container-fluid">' . $modernHeader . $modernStats . '<div class="row">', $content);
        
        $content = preg_replace('/<div class="card my-3">.*?<\/div>\s*<\/div>\s*<\/div>/s', 
            $modernTable . '</div></div>', $content, 1);
        
        // Replace CSS and JS
        $content = preg_replace('/@section\("css"\).*?@stop/s', 
            '@section("css")' . $modernCSS . '@stop', $content);
        
        $content = preg_replace('/@section\("js"\).*?@stop/s', 
            '@section("js")' . $modernJS . '@stop', $content);
        
        return $content;
    }

    private function upgradeCreateFile($content, $directory)
    {
        $modernHeader = $this->getModernHeader($directory, 'Créer');
        $modernForm = $this->getModernForm($directory, 'create');
        $modernCSS = $this->getModernFormCSS($directory);
        
        // Replace old content
        $content = preg_replace('/<div class="container">\s*<div class="row justify-content-center">\s*<div class="col-md-8">/s', 
            '<div class="container-fluid">' . $modernHeader . '<div class="row justify-content-center"><div class="col-lg-8">', $content);
        
        $content = preg_replace('/<div class="card my-5">.*?<\/div>\s*<\/div>\s*<\/div>/s', 
            $modernForm . '</div></div>', $content, 1);
        
        // Replace CSS
        $content = preg_replace('/@section\("css"\).*?@stop/s', 
            '@section("css")' . $modernCSS . '@stop', $content);
        
        return $content;
    }

    private function upgradeEditFile($content, $directory)
    {
        $modernHeader = $this->getModernHeader($directory, 'Modifier');
        $modernForm = $this->getModernForm($directory, 'edit');
        $modernCSS = $this->getModernFormCSS($directory);
        
        // Replace old content
        $content = preg_replace('/<div class="container">\s*<div class="row justify-content-center">\s*<div class="col-md-8">/s', 
            '<div class="container-fluid">' . $modernHeader . '<div class="row justify-content-center"><div class="col-lg-8">', $content);
        
        $content = preg_replace('/<div class="card my-5">.*?<\/div>\s*<\/div>\s*<\/div>/s', 
            $modernForm . '</div></div>', $content, 1);
        
        // Replace CSS
        $content = preg_replace('/@section\("css"\).*?@stop/s', 
            '@section("css")' . $modernCSS . '@stop', $content);
        
        return $content;
    }

    private function upgradeShowFile($content, $directory)
    {
        // Show files are already upgraded, just ensure consistency
        return $content;
    }

    private function getModernHeader($directory, $action)
    {
        $icons = [
            'servicess' => 'fas fa-cogs',
            'conges' => 'fas fa-calendar-alt',
            'attestations' => 'fas fa-certificate'
        ];
        
        $titles = [
            'servicess' => 'Services',
            'conges' => 'Congés',
            'attestations' => 'Attestations'
        ];
        
        $icon = $icons[$directory] ?? 'fas fa-list';
        $title = $titles[$directory] ?? ucfirst($directory);
        
        return '
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="header-content">
            <div class="header-icon">
                <i class="' . $icon . '"></i>
            </div>
            <div class="header-info">
                <h1 class="header-title">' . $action . ' ' . $title . '</h1>
                <p class="header-subtitle">Gestion complète des ' . strtolower($title) . ' de l\'entreprise</p>
            </div>
            <div class="header-actions">
                <a href="{{ route(\'' . $directory . '.create\') }}" class="btn-modern btn-primary">
                    <i class="fas fa-plus"></i>
                    Nouveau ' . substr($title, 0, -1) . '
                </a>
            </div>
        </div>
    </div>';
    }

    private function getModernStats($directory)
    {
        return '
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $' . $directory . '->count() }}</div>
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
                    <div class="stat-number">{{ $' . $directory . '->where(\'status\', \'active\')->count() }}</div>
                    <div class="stat-label">Actifs</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $' . $directory . '->where(\'status\', \'pending\')->count() }}</div>
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
                    <div class="stat-number">{{ $' . $directory . '->where(\'created_at\', \'>=\', now()->startOfMonth())->count() }}</div>
                    <div class="stat-label">Ce mois</div>
                </div>
            </div>
        </div>
    </div>';
    }

    private function getModernTable($directory)
    {
        return '
    <!-- Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="content-card">
                <div class="card-header-modern">
                    <div class="header-left">
                        <i class="fas fa-table"></i>
                        <h3>Tableau des ' . ucfirst($directory) . '</h3>
                    </div>
                    <div class="header-right">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" placeholder="Rechercher...">
                        </div>
                    </div>
                </div>
                <div class="card-body-modern">
                    @include(\'layouts.alert\')
                    <div class="table-responsive">
                        <table id="myTable" class="table-modern">
                            <!-- Table content will be preserved -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }

    private function getModernForm($directory, $type)
    {
        $action = $type === 'create' ? 'Créer' : 'Modifier';
        
        return '
            <div class="content-card">
                <div class="card-header-modern">
                    <div class="header-left">
                        <i class="fas fa-' . ($type === 'create' ? 'plus' : 'edit') . '"></i>
                        <h3>' . $action . ' les Informations</h3>
                    </div>
                </div>
                <div class="card-body-modern">
                    @include(\'layouts.alert\')
                    
                    <form method="POST" action="{{ route(\'' . $directory . '.' . ($type === 'create' ? 'store' : 'update') . '\', ' . ($type === 'edit' ? '$' . substr($directory, 0, -1) . '->id' : '') . ') }}" enctype="multipart/form-data" class="modern-form">
                        @csrf
                        ' . ($type === 'edit' ? '@method(\'PUT\')' : '') . '

                        <div class="form-sections">
                            <!-- Form content will be preserved -->
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-modern btn-secondary" onclick="history.back()">
                                <i class="fas fa-times"></i>
                                Annuler
                            </button>
                            <button type="submit" class="btn-modern btn-primary">
                                <i class="fas fa-save"></i>
                                ' . $action . '
                            </button>
                        </div>
                    </form>
                </div>
            </div>';
    }

    private function getModernCSS($directory)
    {
        $colors = [
            'servicess' => ['#fa709a', '#fee140'],
            'conges' => ['#a8edea', '#fed6e3'],
            'attestations' => ['#ffecd2', '#fcb69f']
        ];
        
        $color1 = $colors[$directory][0] ?? '#667eea';
        $color2 = $colors[$directory][1] ?? '#764ba2';
        
        return '
<style>
    /* Modern CSS styles for ' . $directory . ' */
    .page-header {
        background: linear-gradient(135deg, ' . $color1 . ' 0%, ' . $color2 . ' 100%);
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
        background: linear-gradient(135deg, ' . $color1 . ' 0%, ' . $color2 . ' 100%);
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
        background: linear-gradient(135deg, ' . $color1 . ' 0%, ' . $color2 . ' 100%);
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
</style>';
    }

    private function getModernFormCSS($directory)
    {
        $colors = [
            'servicess' => ['#fa709a', '#fee140'],
            'conges' => ['#a8edea', '#fed6e3'],
            'attestations' => ['#ffecd2', '#fcb69f']
        ];
        
        $color1 = $colors[$directory][0] ?? '#667eea';
        $color2 = $colors[$directory][1] ?? '#764ba2';
        
        return '
<style>
    /* Modern Form CSS styles for ' . $directory . ' */
    .page-header {
        background: linear-gradient(135deg, ' . $color1 . ' 0%, ' . $color2 . ' 100%);
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
        background: linear-gradient(135deg, ' . $color1 . ' 0%, ' . $color2 . ' 100%);
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

    .card-body-modern {
        padding: 2rem;
    }

    /* Form Sections */
    .form-sections {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .form-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 1.5rem;
        border: 1px solid #dee2e6;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid ' . $color1 . ';
    }

    .section-header i {
        font-size: 1.5rem;
        color: ' . $color1 . ';
    }

    .section-header h4 {
        margin: 0;
        color: #2d3748;
        font-weight: 600;
        font-size: 1.2rem;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    /* Form Labels */
    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #4a5568;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-label i {
        color: ' . $color1 . ';
        font-size: 1rem;
    }

    /* Form Controls */
    .form-control-modern {
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        color: #2d3748;
        resize: vertical;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: ' . $color1 . ';
        box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
        transform: translateY(-2px);
    }

    .form-control-modern::placeholder {
        color: #a0aec0;
    }

    /* Error Messages */
    .error-message {
        color: #e53e3e;
        font-size: 0.85rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .error-message::before {
        content: "⚠";
        font-size: 1rem;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    /* Modern Buttons */
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
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, ' . $color1 . ' 0%, ' . $color2 . ' 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(79, 172, 254, 0.4);
        color: white;
    }

    .btn-secondary {
        background: rgba(255,255,255,0.2);
        color: white;
        border: 2px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(10px);
    }

    .btn-secondary:hover {
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

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
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
        }

        .card-body-modern {
            padding: 1.5rem;
        }

        .form-section {
            padding: 1rem;
        }
    }
</style>';
    }

    private function getModernJS($directory)
    {
        return '
<script>
    $(document).ready(function() {
        $(\'#myTable\').DataTable({
            dom: \'Bfrtip\',
            buttons: [
                {
                    extend: \'copy\',
                    className: \'btn-modern btn-secondary\',
                    text: \'<i class="fas fa-copy"></i> Copier\'
                },
                {
                    extend: \'excel\',
                    className: \'btn-modern btn-success\',
                    text: \'<i class="fas fa-file-excel"></i> Excel\'
                },
                {
                    extend: \'csv\',
                    className: \'btn-modern btn-info\',
                    text: \'<i class="fas fa-file-csv"></i> CSV\'
                },
                {
                    extend: \'pdf\',
                    className: \'btn-modern btn-danger\',
                    text: \'<i class="fas fa-file-pdf"></i> PDF\'
                },
                {
                    extend: \'print\',
                    className: \'btn-modern btn-warning\',
                    text: \'<i class="fas fa-print"></i> Imprimer\'
                }
            ],
            language: {
                url: \'//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json\'
            },
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
            responsive: true,
            order: [[1, \'asc\']]
        });

        // Search functionality
        $(\'#searchInput\').on(\'keyup\', function() {
            $(\'#myTable\').DataTable().search(this.value).draw();
        });
    });

    function confirmDelete(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: \'btn btn-success\',
                cancelButton: \'btn btn-danger me-2\'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: \'Êtes-vous sûr ?\',
            text: "Cette action est irréversible !",
            icon: \'warning\',
            showCancelButton: true,
            confirmButtonText: \'Oui, supprimer !\',
            cancelButtonText: \'Annuler\',
            reverseButtons: true,
            background: \'#fff\',
            backdrop: \'rgba(0,0,0,0.4)\'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(\'delete-form-\' + id).submit();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    \'Annulé\',
                    \'L\'élément est en sécurité :)\',
                    \'error\'
                )
            }
        })
    }
</script>

@if(session()->has("success"))
<script>
    Swal.fire({
        position: \'top-end\',
        icon: \'success\',
        title: "{{ session()->get(\'success\') }}",
        showConfirmButton: false,
        timer: 3500,
        background: \'#fff\',
        backdrop: \'rgba(0,0,0,0.4)\'
    });
</script>
@endif';
    }
}
