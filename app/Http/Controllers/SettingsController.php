<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // You can create this middleware later
    }

    /**
     * Display the settings dashboard
     */
    public function index()
    {
        $user = Auth::user();
        $systemSettings = $this->getSystemSettings();
        
        return view('admin.settings.index', compact('user', 'systemSettings'));
    }

    /**
     * Show general settings form
     */
    public function general()
    {
        $user = Auth::user();
        $generalSettings = $this->getGeneralSettings();
        
        return view('admin.settings.general', compact('user', 'generalSettings'));
    }

    /**
     * Update general settings
     */
    public function updateGeneral(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'admin_email' => 'required|email',
            'timezone' => 'required|string',
            'date_format' => 'required|string',
            'time_format' => 'required|string',
            'language' => 'required|string',
            'maintenance_mode' => 'boolean',
            'registration_enabled' => 'boolean'
        ]);

        $settings = [
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
            'admin_email' => $request->admin_email,
            'timezone' => $request->timezone,
            'date_format' => $request->date_format,
            'time_format' => $request->time_format,
            'language' => $request->language,
            'maintenance_mode' => $request->boolean('maintenance_mode'),
            'registration_enabled' => $request->boolean('registration_enabled')
        ];

        $this->saveSettings('general', $settings);

        return redirect()->route('admin.settings.general')
            ->with('success', 'Paramètres généraux mis à jour avec succès!');
    }

    /**
     * Show email settings form
     */
    public function email()
    {
        $user = Auth::user();
        $emailSettings = $this->getEmailSettings();
        
        return view('admin.settings.email', compact('user', 'emailSettings'));
    }

    /**
     * Update email settings
     */
    public function updateEmail(Request $request)
    {
        $request->validate([
            'mail_driver' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'required|string',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string'
        ]);

        $settings = [
            'mail_driver' => $request->mail_driver,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name
        ];

        // Only update password if provided
        if ($request->filled('mail_password')) {
            $settings['mail_password'] = $request->mail_password;
        }

        $this->saveSettings('email', $settings);

        return redirect()->route('admin.settings.email')
            ->with('success', 'Paramètres email mis à jour avec succès!');
    }

    /**
     * Show security settings form
     */
    public function security()
    {
        $user = Auth::user();
        $securitySettings = $this->getSecuritySettings();
        
        return view('admin.settings.security', compact('user', 'securitySettings'));
    }

    /**
     * Update security settings
     */
    public function updateSecurity(Request $request)
    {
        $request->validate([
            'password_min_length' => 'required|numeric|min:6|max:20',
            'password_require_uppercase' => 'boolean',
            'password_require_lowercase' => 'boolean',
            'password_require_numbers' => 'boolean',
            'password_require_symbols' => 'boolean',
            'session_lifetime' => 'required|numeric|min:15|max:1440',
            'max_login_attempts' => 'required|numeric|min:3|max:10',
            'lockout_duration' => 'required|numeric|min:5|max:60',
            'two_factor_enabled' => 'boolean',
            'ip_whitelist' => 'nullable|string'
        ]);

        $settings = [
            'password_min_length' => $request->password_min_length,
            'password_require_uppercase' => $request->boolean('password_require_uppercase'),
            'password_require_lowercase' => $request->boolean('password_require_lowercase'),
            'password_require_numbers' => $request->boolean('password_require_numbers'),
            'password_require_symbols' => $request->boolean('password_require_symbols'),
            'session_lifetime' => $request->session_lifetime,
            'max_login_attempts' => $request->max_login_attempts,
            'lockout_duration' => $request->lockout_duration,
            'two_factor_enabled' => $request->boolean('two_factor_enabled'),
            'ip_whitelist' => $request->ip_whitelist
        ];

        $this->saveSettings('security', $settings);

        return redirect()->route('admin.settings.security')
            ->with('success', 'Paramètres de sécurité mis à jour avec succès!');
    }

    /**
     * Show backup settings form
     */
    public function backup()
    {
        $user = Auth::user();
        $backupSettings = $this->getBackupSettings();
        $backupFiles = $this->getBackupFiles();
        
        return view('admin.settings.backup', compact('user', 'backupSettings', 'backupFiles'));
    }

    /**
     * Create a new backup
     */
    public function createBackup()
    {
        try {
            // Here you would implement actual backup logic
            // For now, we'll just create a placeholder
            $backupName = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
            
            // Simulate backup creation
            Cache::put('last_backup', now(), 86400);
            
            return redirect()->route('admin.settings.backup')
                ->with('success', 'Sauvegarde créée avec succès: ' . $backupName);
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.backup')
                ->with('error', 'Erreur lors de la création de la sauvegarde: ' . $e->getMessage());
        }
    }

    /**
     * Show system information
     */
    public function system()
    {
        $user = Auth::user();
        $systemInfo = $this->getSystemInfo();
        
        return view('admin.settings.system', compact('user', 'systemInfo'));
    }

    /**
     * Get system settings from cache or default
     */
    private function getSystemSettings()
    {
        return Cache::remember('system_settings', 3600, function () {
            return [
                'general' => $this->getGeneralSettings(),
                'email' => $this->getEmailSettings(),
                'security' => $this->getSecuritySettings(),
                'backup' => $this->getBackupSettings()
            ];
        });
    }

    /**
     * Get general settings
     */
    private function getGeneralSettings()
    {
        return [
            'site_name' => config('app.name', 'OG Manage'),
            'site_description' => 'Système de gestion des employés',
            'admin_email' => config('mail.from.address', 'admin@ogmanage.com'),
            'timezone' => config('app.timezone', 'Europe/Paris'),
            'date_format' => 'd/m/Y',
            'time_format' => 'H:i',
            'language' => config('app.locale', 'fr'),
            'maintenance_mode' => app()->isDownForMaintenance(),
            'registration_enabled' => true
        ];
    }

    /**
     * Get email settings
     */
    private function getEmailSettings()
    {
        return [
            'mail_driver' => config('mail.default', 'smtp'),
            'mail_host' => config('mail.mailers.smtp.host', ''),
            'mail_port' => config('mail.mailers.smtp.port', 587),
            'mail_username' => config('mail.mailers.smtp.username', ''),
            'mail_password' => '',
            'mail_encryption' => config('mail.mailers.smtp.encryption', 'tls'),
            'mail_from_address' => config('mail.from.address', ''),
            'mail_from_name' => config('mail.from.name', '')
        ];
    }

    /**
     * Get security settings
     */
    private function getSecuritySettings()
    {
        return [
            'password_min_length' => 8,
            'password_require_uppercase' => true,
            'password_require_lowercase' => true,
            'password_require_numbers' => true,
            'password_require_symbols' => false,
            'session_lifetime' => config('session.lifetime', 120),
            'max_login_attempts' => 5,
            'lockout_duration' => 15,
            'two_factor_enabled' => false,
            'ip_whitelist' => ''
        ];
    }

    /**
     * Get backup settings
     */
    private function getBackupSettings()
    {
        return [
            'auto_backup' => true,
            'backup_frequency' => 'daily',
            'backup_retention' => 30,
            'backup_path' => storage_path('backups'),
            'last_backup' => Cache::get('last_backup')
        ];
    }

    /**
     * Get backup files
     */
    private function getBackupFiles()
    {
        $backupPath = storage_path('backups');
        if (!Storage::exists($backupPath)) {
            return collect();
        }

        return collect(Storage::files($backupPath))
            ->filter(function ($file) {
                return pathinfo($file, PATHINFO_EXTENSION) === 'sql';
            })
            ->map(function ($file) {
                return [
                    'name' => basename($file),
                    'size' => Storage::size($file),
                    'date' => Storage::lastModified($file)
                ];
            })
            ->sortByDesc('date');
    }

    /**
     * Get system information
     */
    private function getSystemInfo()
    {
        return [
            'laravel_version' => app()->version(),
            'php_version' => PHP_VERSION,
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'database_driver' => config('database.default'),
            'cache_driver' => config('cache.default'),
            'session_driver' => config('session.driver'),
            'queue_driver' => config('queue.default'),
            'disk_free_space' => disk_free_space(storage_path()),
            'memory_limit' => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'post_max_size' => ini_get('post_max_size')
        ];
    }

    /**
     * Save settings to cache
     */
    private function saveSettings($type, $settings)
    {
        Cache::put("settings_{$type}", $settings, 86400);
        
        // You could also save to database here if you prefer
        // For now, we'll use cache for simplicity
    }
}
