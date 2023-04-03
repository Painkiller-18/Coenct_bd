<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nivelacceso extends Model
{
    protected $table = 'nivelacceso';
    protected $fillable = ['nombre','nivel','status'];
}
