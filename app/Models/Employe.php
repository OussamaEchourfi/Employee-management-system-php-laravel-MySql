<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nomComplet', 'cin', 'hire_date', 'phone', 'address', 'city', 'Idservice'
    ];

    protected $casts = [
        'hire_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'Idservice');
    }

    public function conges()
    {
        return $this->hasMany(Conge::class, 'employID');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'employe_id');
    }
}
