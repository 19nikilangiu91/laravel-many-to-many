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
}