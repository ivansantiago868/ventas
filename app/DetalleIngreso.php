<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingreso'; //tabla con la que se conecta
    protected $primaryKey = 'iddetalle_ingreso'; //primaryKey de la tabla

    public $timestamps = false; //columnas de creación y actualización de registro

    protected $fillable = [
    	'idingreso',
    	'idarticulo',
    	'cantidad',
    	'precio_compra',
    	'precio_venta'
    	]; // cuando si queremos que se guarden en el modelo

    protected $guarded = [

    ]; // cuando no queremos que se asignen al modelo
}
