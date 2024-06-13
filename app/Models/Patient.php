<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dateNaissance',
        'sexe',
        'adresse',
        'telephone',
        'email',
        'numero_securite_sociale',
         'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function rendezvous()
    {
        return $this->hasMany(Rdv::class);
    }

    public function dossiers()
    {
        return $this->hasMany(DossierMedicale::class);
    }

}
