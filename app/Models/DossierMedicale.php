<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedicale extends Model
{
    use HasFactory;



    protected $fillable = [
        'patient_id',
        'medecin_id',
        'date_creation',
        'allergies',
        'traitement',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
