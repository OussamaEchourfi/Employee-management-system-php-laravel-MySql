<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Conge;

class EmployeDashboardController extends Controller
{
    /**
     * Show the employe login form
     */
    public function showLogin()
    {
        return view('employe.login');
    }

    /**
     * Handle employe login
     */
    public function login(Request $request)
    {
        $request->validate([
            'cin' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find employe by CIN
        $employe = Employe::where('cin', $request->cin)->first();

        if (!$employe) {
            return back()->withErrors(['cin' => 'CIN non trouvé.']);
        }

        // For now, we'll use a simple password check
        // In production, you should implement proper password hashing
        if ($request->password === 'password123') { // Default password
            // Store employe info in session
            session(['employe_id' => $employe->id, 'employe_name' => $employe->nomComplet]);
            return redirect()->route('employe.dashboard');
        }

        return back()->withErrors(['password' => 'Mot de passe incorrect.']);
    }

    /**
     * Show employe dashboard
     */
    public function dashboard()
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $employe = Employe::find(session('employe_id'));
        $tasks = Task::where('employe_id', session('employe_id'))
            ->orderBy('due_date', 'asc')
            ->get();

        $conges = Conge::where('employID', session('employe_id'))->get();

        $stats = [
            'total' => $tasks->count(),
            'pending' => $tasks->where('status', 'pending')->count(),
            'in_progress' => $tasks->where('status', 'in_progress')->count(),
            'completed' => $tasks->where('status', 'completed')->count(),
            'overdue' => $tasks->where('due_date', '<', now())->where('status', '!=', 'completed')->count(),
        ];

        $congesStats = [
            'total' => $conges->count(),
            'pending' => $conges->where('status', 'pending')->count(),
            'approved' => $conges->where('status', 'approved')->count(),
            'rejected' => $conges->where('status', 'rejected')->count(),
        ];

        return view('employe.dashboard', compact('employe', 'tasks', 'stats', 'congesStats'));
    }

    /**
     * Show employe profile
     */
    public function profile()
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $employe = Employe::find(session('employe_id'));
        return view('employe.profile', compact('employe'));
    }

    /**
     * Update task status
     */
    public function updateTaskStatus(Request $request, $taskId)
    {
        if (!session('employe_id')) {
            return redirect()->route('employe.login');
        }

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::where('id', $taskId)
            ->where('employe_id', session('employe_id'))
            ->firstOrFail();

        $data = ['status' => $request->status];

        if ($request->status === 'completed') {
            $data['completed_at'] = now();
        } else {
            $data['completed_at'] = null;
        }

        $task->update($data);

        return redirect()->back()->with([
            'success' => 'Statut de la tâche mis à jour avec succès'
        ]);
    }

    /**
     * Logout employe
     */
    public function logout()
    {
        session()->forget(['employe_id', 'employe_name']);
        return redirect()->route('employe.login')->with('success', 'Déconnexion réussie');
    }
}
