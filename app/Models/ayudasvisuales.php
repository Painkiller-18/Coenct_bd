<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ayudasvisuales extends Model
{
    protected $table = 'ayudasvisuales';
    protected $fillable = ['nombre','pieza','documento','fecha_creacion','fecha_actualizacion','status'];
    public $timestamps = false;
}
