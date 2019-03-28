<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta'; //tabla con la que se conecta
    protected $primaryKey = 'iddetalle_venta'; //primaryKey de la tabla

    public $timestamps = false; //columnas de creación y actualización de registro

    protected $fillable = [
    	'idventa',
    	'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'descuento'
    	]; // cuando si queremos que se guarden en el modelo

    protected $guarded = [

    ]; // cuando no queremos que se asignen al modelo
}
