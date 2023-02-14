<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 4) Importo gli elementi dalla migration e vado ad inserirli nel "$fillable"
    protected $fillable = [

        'code',
        'name',
        'description',
        'price',
        'weight',
    ];

    // 10b) Dichiaro la relazione per la Tabella Ponte "Category"
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    // 11b) Dichiaro la relazione indiretta tra "Product" e "Typology"
    public function typology()
    {
        return $this->belongsTo(Typology::class);
    }
}