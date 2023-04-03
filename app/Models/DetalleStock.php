<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleStock extends Model
{
    use HasFactory;
    protected $table = "detalle_stock";
    public $timestamps = false;
}
