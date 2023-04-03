<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendario extends Model
{
    protected $table = 'calendario';
    protected $primaryKey  = 'id';
    protected $fillable = ['id_operacion','nombre','codigo_alm',
    	'codigo_sap','pieza_ok','pieza_nok','vida_util','id_ayuda_visual',
    	'id_kaizen','fecha_historico','fecha_cambio','status','descripcion',
        'aviso_lectura', 'stock', 'maximo', 'minimo'];
    public $timestamps = false;

    public function ayudasvisuales(){
         return $this->belongsTo('App\Models\ayudasvisuales','id_ayudasvisuales','id');
    }

    public function kaizen(){
        return $this->belongsTo('App\Models\kaizen','id_kaizen','id');
    }

    public function operaciones(){
        return $this->belongsTo('App\Models\operaciones','id_operacion','id');
   }
}
