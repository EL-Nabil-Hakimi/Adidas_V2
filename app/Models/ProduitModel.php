<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitModel extends Model
{
    use HasFactory;
    protected $table = 'produit';
    protected $fillable = [
        'name',
        'description',
        'prix',
        'image',
        'categorie_id'];
}
