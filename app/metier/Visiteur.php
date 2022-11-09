<?php

namespace App\metier;

class Visiteur extends Model
{
    protected $table = 'visiteur';
    public $timestamps = false;
    protected $fillable = [
        'id_visiteur',
        'id_laboratoire',
        'id_secteur',
        'nom_visiteur',
        'prenom_visiteur',
        'adresse_visiteur',
        'cp_visteur',
        'ville_visiteur',
        'date_embauche',
        'login_visiteur',
        'pwd_visiteur',
        'type_visiteur'
    ];
}
