<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso'; //tabla con la que se conecta
    protected $primaryKey = 'idingreso'; //primaryKey de la tabla

    public $timestamps = false; //columnas de creación y actualización de registro

    protected $fillable = [
    	'idproveedor',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'estado'
    	]; // cuando si queremos que se guarden en el modelo

    protected $guarded = [

    ]; // cuando no queremos que se asignen al modelo
}
