<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta'; //tabla con la que se conecta
    protected $primaryKey = 'idventa'; //primaryKey de la tabla

    public $timestamps = false; //columnas de creación y actualización de registro

    protected $fillable = [
    	'idcliente',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'total_venta',
    	'estado'
    	]; // cuando si queremos que se guarden en el modelo

    protected $guarded = [

    ]; // cuando no queremos que se asignen al modelo
}
