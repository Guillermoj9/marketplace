<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    public function tienda()
    {
        return $this->belongsTo(Producto::class, 'tienda_id');
    }
    
}
