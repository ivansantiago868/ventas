<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Categoria;
use Illuminate\Support\Fecades\Redirect;
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
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
    		$categorias = DB::table('categoria')
    		-> where('nombre','LIKE','%'.$query.'%')
    		-> where ('condicion','=','1') //espera tres parametros 1ro campo filtro, 2do comando sql, 3ro texto a buscar
    		-> orderBy ('idcategoria','desc') // espera dos parametros, 1ro campo para organizar el orden, 2do que tipo de orden
    		-> paginate(7); // realizar la paginacion

    		return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("almacen.categoria.create");	
    }

    public function store(CategoriaFormRequest $request)
    {
    	$categoria = new Categoria;
    	$categoria -> nombre = $request -> get('nombre');
    	$categoria -> descripcion = $request -> get('descripcion');
    	$categoria -> condicion = '1';
    	$categoria -> save();

    	return Redirect('almacen/categoria');
    }

    public function show($id) //id de la categoria que quiero mostrar
    {
    	return view("almacen.categoria.show",["categoria" => Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("almacen.categoria.edit",["categoria" => Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id) //id de la categoria que quiero modificar
    {
    	$categoria = Categoria::findOrFail($id);
    	$categoria -> nombre = $request -> get('nombre');
		$categoria -> descripcion = $request -> get('descripcion');
		$categoria -> update();    

		return Redirect('almacen/categoria');
    }

    public function destroy($id)
    {
    	$categoria = Categoria::findOrFail($id);
    	$categoria -> condicion = '0'; //no muestra mas la categoria
    	$categoria -> update();

    	return Redirect('almacen/categoria');
    }

}
