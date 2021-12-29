<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Obtiene los productos
     */
    public function products()
    {
        return $this->belongsToMany(User::class, 'products')->withPivot('name', 'quantity');
    }
}
