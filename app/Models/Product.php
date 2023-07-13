<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prix',
        'description',
        'image',
        'categorie_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
