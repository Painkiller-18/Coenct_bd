<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analisisdesgaste extends Model
{
    protected $table = 'analisisdesgaste';
    protected $fillable = ['nombre','documento','fecha_creacion','status'];
    public $timestamps = false;

}
