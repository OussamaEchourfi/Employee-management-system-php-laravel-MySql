<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Employe;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get existing employees and users
        $employes = Employe::all();
        $users = User::all();

        if ($employes->isEmpty() || $users->isEmpty()) {
            $this->command->warn('No employees or users found. Please run EmployeSeeder and AdminSeeder first.');
            return;
        }

        // Create sample tasks
        $tasks = [
            [
                'title' => 'Révision du code de l\'application web',
                'description' => 'Effectuer une révision complète du code de l\'application web pour identifier et corriger les bugs potentiels.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(7),
            ],
            [
                'title' => 'Mise à jour de la documentation technique',
                'description' => 'Mettre à jour la documentation technique du projet avec les nouvelles fonctionnalités ajoutées.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(3),
            ],
            [
                'title' => 'Tests de sécurité de l\'application',
                'description' => 'Effectuer des tests de sécurité approfondis pour identifier les vulnérabilités potentielles.',
                'status' => 'pending',
                'priority' => 'urgent',
                'due_date' => now()->addDays(2),
            ],
            [
                'title' => 'Optimisation des performances',
                'description' => 'Analyser et optimiser les performances de l\'application pour améliorer la vitesse de chargement.',
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(14),
            ],
            [
                'title' => 'Formation des nouveaux développeurs',
                'description' => 'Organiser une session de formation pour les nouveaux développeurs sur les outils et processus de l\'équipe.',
                'status' => 'completed',
                'priority' => 'low',
                'due_date' => now()->subDays(5),
                'completed_at' => now()->subDays(2),
            ],
            [
                'title' => 'Réunion de planification du sprint',
                'description' => 'Organiser et animer la réunion de planification du prochain sprint avec l\'équipe de développement.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(1),
            ],
            [
                'title' => 'Maintenance des serveurs',
                'description' => 'Effectuer la maintenance préventive des serveurs de production et de développement.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(5),
            ],
            [
                'title' => 'Analyse des logs d\'erreur',
                'description' => 'Analyser les logs d\'erreur récents pour identifier les problèmes récurrents et proposer des solutions.',
                'status' => 'pending',
                'priority' => 'low',
                'due_date' => now()->addDays(10),
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::create([
                'title' => $taskData['title'],
                'description' => $taskData['description'],
                'status' => $taskData['status'],
                'priority' => $taskData['priority'],
                'due_date' => $taskData['due_date'],
                'employe_id' => $employes->random()->id,
                'assigned_by' => $users->random()->id,
                'completed_at' => $taskData['completed_at'] ?? null,
            ]);
        }

        $this->command->info('Sample tasks created successfully!');
    }
}
