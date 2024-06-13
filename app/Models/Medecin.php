<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Medecin extends Model
{
    use HasFactory,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'specialite',
        'numero_licence',
        'telephone',
        'email',
        'adresse',
        'date_embauche',
         'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function dossiers()
    {
        return $this->hasMany(DossierMedicale::class);
    }
}
