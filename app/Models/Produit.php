<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    // use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'v_produit';
    protected $fillable = [
        'id',
        'idcategorie',
        'categorie',
        'idmodele',
        'modele',
        'designation',
        'photo',
        'idmarque',
        'marque',
        'prix',
        'puissance',
        'caracteristique',
        'fiche'
       
    ];
}
