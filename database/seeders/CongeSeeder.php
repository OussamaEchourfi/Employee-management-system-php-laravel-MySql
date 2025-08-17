<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conge;
use App\Models\Employe;
use Carbon\Carbon;

class CongeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer quelques employés existants
        $employes = Employe::take(3)->get();
        
        if ($employes->count() == 0) {
            $this->command->info('Aucun employé trouvé. Créez d\'abord des employés.');
            return;
        }

        $typesConges = [
            'Congé annuel',
            'Congé maladie',
            'Congé formation',
            'Congé maternité',
            'Congé paternité'
        ];

        $statuts = ['pending', 'approved', 'rejected'];

        foreach ($employes as $employe) {
            // Créer 2-3 demandes de congé par employé
            for ($i = 0; $i < rand(2, 3); $i++) {
                $dateDepart = Carbon::now()->addDays(rand(10, 60));
                $duree = rand(1, 15);
                $dateRetour = $dateDepart->copy()->addDays($duree - 1);
                
                $conge = Conge::create([
                    'employID' => $employe->id,
                    'droitConge' => $typesConges[array_rand($typesConges)],
                    'duree' => $duree,
                    'dataDepart' => $dateDepart,
                    'dateRetour' => $dateRetour,
                    'status' => $statuts[array_rand($statuts)],
                    'motif' => 'Demande de congé pour ' . strtolower($typesConges[array_rand($typesConges)]) . ' - Motif personnel.',
                    'created_at' => Carbon::now()->subDays(rand(1, 30)),
                    'updated_at' => Carbon::now()->subDays(rand(1, 30)),
                ]);

                // Si le congé est approuvé ou rejeté, ajouter un commentaire admin
                if ($conge->status !== 'pending') {
                    $conge->update([
                        'admin_comment' => $conge->status === 'approved' 
                            ? 'Demande approuvée par l\'administration.' 
                            : 'Demande rejetée - Motif non justifié.',
                        'processed_at' => Carbon::now()->subDays(rand(1, 15))
                    ]);
                }
            }
        }

        $this->command->info('Demandes de congé de test créées avec succès !');
    }
}
