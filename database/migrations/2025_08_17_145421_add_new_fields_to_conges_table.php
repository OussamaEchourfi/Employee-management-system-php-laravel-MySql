<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conges', function (Blueprint $table) {
            // Ajouter le statut de la demande
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('dataDepart');
            
            // Ajouter la date de retour
            $table->date('dateRetour')->nullable()->after('status');
            
            // Ajouter le motif du congé
            $table->text('motif')->nullable()->after('dateRetour');
            
            // Ajouter la date de traitement par l'admin
            $table->timestamp('processed_at')->nullable()->after('motif');
            
            // Ajouter le commentaire de l'admin
            $table->text('admin_comment')->nullable()->after('processed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conges', function (Blueprint $table) {
            $table->dropColumn(['status', 'dateRetour', 'motif', 'processed_at', 'admin_comment']);
        });
    }
}
