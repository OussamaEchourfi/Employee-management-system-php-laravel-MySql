<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Mettre à jour les enregistrements existants qui ont des valeurs NULL
        DB::table('conges')
            ->whereNull('status')
            ->update(['status' => 'pending']);

        DB::table('conges')
            ->whereNull('created_at')
            ->update(['created_at' => now()]);

        DB::table('conges')
            ->whereNull('updated_at')
            ->update(['updated_at' => now()]);

        // Pour les congés qui n'ont pas de date de retour, utiliser la date de départ + durée
        DB::table('conges')
            ->whereNull('dateRetour')
            ->whereNotNull('dataDepart')
            ->whereNotNull('duree')
            ->update([
                'dateRetour' => DB::raw('DATE_ADD(dataDepart, INTERVAL duree - 1 DAY)')
            ]);

        // Pour les congés qui n'ont pas de motif, ajouter un motif par défaut
        DB::table('conges')
            ->whereNull('motif')
            ->update(['motif' => 'Demande de congé standard']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Cette migration ne peut pas être annulée car elle met à jour des données existantes
    }
};
