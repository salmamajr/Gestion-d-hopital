<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'medecin_id',
        'date',
        'heure',
        'motif',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the medecin that owns the rdv.
     */
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
    
}
