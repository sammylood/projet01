<?php
namespace App\Models;
use App\Models\CRUD;

class Encheres extends CRUD{

    protected $table = "projet_web_01.encheres";
    protected $primaryKey = "id";
    protected $fillable = ['date_debut', 'date_fin', 'prix_debut', 'vedette'];
}