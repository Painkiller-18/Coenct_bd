<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kaizen extends Model
{
    protected $table = 'kaizen';
    protected $fillable = ['nombre','documento','fecha_creacion','status'];

    public $timestamps = false;

    public function calendario(){
        return $this->belongsToMany(calendario::class);
    }
}
