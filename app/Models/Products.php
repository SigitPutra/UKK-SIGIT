<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // Menentukan atribut yang dapat diisi
    protected $fillable = [
        'name', 'stock', 'price', 'img'
    ];
}
