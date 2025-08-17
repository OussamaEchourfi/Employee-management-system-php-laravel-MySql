<?php

use App\Http\Controllers\AttestationController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\VacancController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeDashboardController;
use App\Http\Controllers\EmployeCongeController;
use App\Http\Controllers\AdminCongeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('employes', 'EmployesController');
    // Route::resource('vacations', 'VacancController');
    Route::get('/vacation/{id}', [VacancController::class, 'index'])->name('vacance_show');
    Route::get('/certificate/{id}', [VacancController::class, 'show'])->name('attest_show');

    //////////////////////////////////////
    Route::resource('divisions', 'divisionController');
    Route::resource('servicess', 'serviceController');
    Route::resource('conges', 'CongeController');
    Route::get('/conges/{id}/vacation', [CongeController::class, 'vacation'])->name('conges.vacation');
    Route::resource('attestations', 'AttestationController');
    Route::get('/attestations/{id}/certificate', [AttestationController::class, 'certificate'])->name('attestations.certificate');

    // Tasks Routes
    Route::resource('tasks', 'TaskController');
    Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.update-status');

    // Admin Conges Routes
    Route::prefix('conges-requests')->group(function () {
        Route::get('/', [AdminCongeController::class, 'index'])->name('admin.conges.index');
        Route::get('/{id}', [AdminCongeController::class, 'show'])->name('admin.conges.show');
        Route::post('/{id}/approve', [AdminCongeController::class, 'approve'])->name('admin.conges.approve');
        Route::post('/{id}/reject', [AdminCongeController::class, 'reject'])->name('admin.conges.reject');
        Route::get('/filter', [AdminCongeController::class, 'filter'])->name('admin.conges.filter');
        Route::get('/export', [AdminCongeController::class, 'export'])->name('admin.conges.export');
    });

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'show'])->name('admin.profile.show');
        Route::get('/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::put('/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('admin.profile.update');
        Route::get('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('admin.profile.change-password');
        Route::put('/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('admin.profile.update-password');
        Route::get('/activity', [App\Http\Controllers\ProfileController::class, 'activity'])->name('admin.profile.activity');
        Route::get('/preferences', [App\Http\Controllers\ProfileController::class, 'preferences'])->name('admin.profile.preferences');
        Route::put('/update-preferences', [App\Http\Controllers\ProfileController::class, 'updatePreferences'])->name('admin.profile.update-preferences');
    });

    // Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/', [App\Http\Controllers\SettingsController::class, 'index'])->name('admin.settings.index');
        Route::get('/general', [App\Http\Controllers\SettingsController::class, 'general'])->name('admin.settings.general');
        Route::put('/general', [App\Http\Controllers\SettingsController::class, 'updateGeneral'])->name('admin.settings.update-general');
        Route::get('/email', [App\Http\Controllers\SettingsController::class, 'email'])->name('admin.settings.email');
        Route::put('/email', [App\Http\Controllers\SettingsController::class, 'updateEmail'])->name('admin.settings.update-email');
        Route::get('/security', [App\Http\Controllers\ProfileController::class, 'security'])->name('admin.settings.security');
        Route::put('/security', [App\Http\Controllers\ProfileController::class, 'updateSecurity'])->name('admin.settings.update-security');
        Route::get('/backup', [App\Http\Controllers\SettingsController::class, 'backup'])->name('admin.settings.backup');
        Route::post('/backup', [App\Http\Controllers\SettingsController::class, 'createBackup'])->name('admin.settings.create-backup');
        Route::get('/system', [App\Http\Controllers\SettingsController::class, 'system'])->name('admin.settings.system');
    });
});

// Employe Routes (Public)
Route::prefix('employe')->group(function () {
    Route::get('/login', [EmployeDashboardController::class, 'showLogin'])->name('employe.login');
    Route::post('/login', [EmployeDashboardController::class, 'login'])->name('employe.login.post');
    Route::get('/dashboard', [EmployeDashboardController::class, 'dashboard'])->name('employe.dashboard');
    Route::get('/profile', [EmployeDashboardController::class, 'profile'])->name('employe.profile');
    Route::patch('/tasks/{id}/status', [EmployeDashboardController::class, 'updateTaskStatus'])->name('employe.tasks.update-status');
    Route::post('/logout', [EmployeDashboardController::class, 'logout'])->name('employe.logout');
    
    // Employe Conges Routes
    Route::prefix('conges')->group(function () {
        Route::get('/', [EmployeCongeController::class, 'index'])->name('employe.conges.index');
        Route::get('/create', [EmployeCongeController::class, 'create'])->name('employe.conges.create');
        Route::post('/', [EmployeCongeController::class, 'store'])->name('employe.conges.store');
        Route::get('/{id}', [EmployeCongeController::class, 'show'])->name('employe.conges.show');
        Route::get('/{id}/edit', [EmployeCongeController::class, 'edit'])->name('employe.conges.edit');
        Route::put('/{id}', [EmployeCongeController::class, 'update'])->name('employe.conges.update');
        Route::delete('/{id}', [EmployeCongeController::class, 'destroy'])->name('employe.conges.destroy');
    });
});
