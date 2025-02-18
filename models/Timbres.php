<?php
namespace App\Models;
use App\Models\CRUD;

class Timbres extends CRUD{

    protected $table = "projet_web_01.timbres";
    protected $primaryKey = "id_timbre";
    protected $fillable = ['nom', 'annee', 'couleur', 'tirage', 'dimensions', 'certifie', 'encheres_id_enchere', 'pays_id_pays', 'conditions_id_condition'];
}