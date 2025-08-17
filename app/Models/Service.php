<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'id', 'titre', 'division_id', 'description', 'responsable'
    ];
    
    public function employes()
    {
        return $this->hasMany(Employe::class, 'Idservice');
    }
    
    public function division()
    {
        return $this->belongsTo(Devision::class, 'division_id');
    }
}
