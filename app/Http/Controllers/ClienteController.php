<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$query = trim($request->get('searchText'));
    		$personas = DB::table('persona')
    		-> where('nombre','LIKE','%'.$query.'%')
    		-> where ('tipo_persona','=','Cliente') //espera tres parametros 1ro campo filtro, 2do comando sql, 3ro texto a buscar
    		-> orwhere('num_documento','LIKE','%'.$query.'%')
    		-> where ('tipo_persona','=','Cliente') //espera tres parametros 1ro campo filtro, 2do comando sql, 3ro texto a buscar
    		-> orderBy ('idpersona','desc') // espera dos parametros, 1ro campo para organizar el orden, 2do que tipo de orden
    		-> paginate(7); // realizar la paginacion

    		return view('ventas.cliente.index',["personas"=>$personas,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("ventas.cliente.create");	
    }

    public function store(PersonaFormRequest $request)
    {
    	$persona = new Persona;
    	$persona -> tipo_persona = 'Cliente';
    	$persona -> nombre = $request -> get('nombre');
    	$persona -> tipo_documento = $request -> get('tipo_documento');
    	$persona -> num_documento = $request -> get('num_documento');
    	$persona -> direccion = $request -> get('direccion');
    	$persona -> telefono = $request -> get('telefono');
    	$persona -> email = $request -> get('email');
   
    	$persona -> save();

    	return Redirect('ventas/cliente');
    }

    public function show($id) //id de la categoria que quiero mostrar
    {
    	return view("ventas.cliente.show",["persona" => Persona::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("ventas.cliente.edit",["persona" => Persona::findOrFail($id)]);
    }

    public function update(PersonaFormRequest $request, $id) //id de la categoria que quiero modificar
    {
    	$persona = Persona::findOrFail($id);
    	$persona -> nombre = $request -> get('nombre');
    	$persona -> tipo_documento = $request -> get('tipo_documento');
    	$persona -> num_documento = $request -> get('num_documento');
    	$persona -> direccion = $request -> get('direccion');
    	$persona -> telefono = $request -> get('telefono');
    	$persona -> email = $request -> get('email');

		$persona -> update();    

		return Redirect('ventas/cliente');
    }

    public function destroy($id)
    {
    	$persona = Persona::findOrFail($id);
    	$persona -> tipo_persona = 'Inactivo'; //no muestra mas la categoria
    	$persona -> update();

    	return Redirect('ventas/cliente');
    }
}
