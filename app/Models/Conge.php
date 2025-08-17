<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    
    protected $table = 'conges';
    
    protected $fillable = [
        'employID', 
        'droitConge', 
        'duree', 
        'dataDepart', 
        'status',
        'dateRetour',
        'motif',
        'processed_at',
        'admin_comment',
        'created_at'
    ];
    
    protected $casts = [
        'dataDepart' => 'date',
        'dateRetour' => 'date',
        'processed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    // Statuts possibles
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employID');
    }
    
    // Scopes pour filtrer par statut
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }
    
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }
    
    public function scopeRejected($query)
    {
        return $query->where('status', self::STATUS_REJECTED);
    }
    
    // Méthodes utilitaires
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }
    
    public function isApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }
    
    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }
    
    // Calculer la durée en jours
    public function getDureeEnJoursAttribute()
    {
        if ($this->dataDepart && $this->dateRetour) {
            return $this->dataDepart->diffInDays($this->dateRetour) + 1;
        }
        return $this->duree ?? 0;
    }
}
