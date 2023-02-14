<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 4) Importo gli elementi dalla migration e vado ad inserirli nel "$fillable"
    protected $fillable = [

        'code',
        'name',
        'description',
    ];

    // 10a) Dichiaro la relazione per la Tabella Ponte "Product"
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}