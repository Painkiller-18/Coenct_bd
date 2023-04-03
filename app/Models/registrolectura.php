<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrolectura extends Model
{
    protected $table = 'registrolectura';
    protected $fillable = ['id_users','id_ayudavisual','status'];
    public $timestamps = false;


    public function users(){
        return $this->belongsTo(User::class,'id_users');
    }

    public function ayudasvisuales(){
        return $this->belongsTo(ayudasvisuales::class,'id_ayudavisual');
    }
}
