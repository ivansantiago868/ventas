<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Articulo; //referencia al modelo
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Input; //para poder subir la imagen desde el cliente al servidor
use sisVentas\Http\Requests\ArticuloFormRequest;
use DB;

class ArticuloController extends Controller
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
    		$articulos = DB::table('articulo as a')
    		-> join('categoria as c', 'a.idcategoria', '=', 'c.idcategoria')
    		-> select('a.idarticulo', 'a.nombre', 'a.codigo', 'a.stock', 'c.nombre as categoria', 'a.descripcion', 'a.imagen', 'a.estado')
    		-> where('a.nombre','LIKE','%'.$query.'%')
    		-> orwhere('a.codigo','LIKE','%'.$query.'%')
    		-> orderBy ('idarticulo','desc') // espera dos parametros, 1ro campo para organizar el orden, 2do que tipo de orden
    		-> paginate(7); // realizar la paginacion

    		return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion', '=', '1')->get();
    	return view("almacen.articulo.create", ['categorias'=>$categorias]);	
    }

    public function store(ArticuloFormRequest $request)
    {
    	$articulo = new Articulo;
    	$articulo -> idcategoria =$request -> get('idcategoria');
    	$articulo -> codigo = $request -> get('codigo');
    	$articulo -> nombre = $request -> get('nombre');
    	$articulo -> stock = $request -> get('stock');
    	$articulo -> descripcion = $request -> get('descripcion');
    	$articulo -> estado = 'Activo';

    	if (Input::hasFile('imagen'))
    	{
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
    		$articulo->imagen=$file->getClientOriginalName();
    	}

    	$articulo -> save();

    	return Redirect('almacen/articulo');
    }

    public function show($id) //id de la categoria que quiero mostrar
    {
    	return view("almacen.articulo.show",["articulo" => Articulo::findOrFail($id)]);
    }

    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=', '1')->get();
    	return view("almacen.articulo.edit",["articulo" => $articulo,"categorias"=>$categorias]);
    }

    public function update(ArticuloFormRequest $request, $id) //id del articulo que quiero modificar
    {
    	$articulo = Articulo::findOrFail($id);
    	$articulo -> idcategoria=$request -> get('idcategoria');
    	$articulo -> codigo = $request -> get('codigo');
    	$articulo -> nombre = $request -> get('nombre');
    	$articulo -> stock = $request -> get('stock');
    	$articulo -> descripcion = $request -> get('descripcion');
        $articulo -> estado = 'Activo';

    	if (Input::hasFile('imagen'))
    	{
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
    		$articulo->imagen=$file->getClientOriginalName();
    	}

		$articulo -> update();    

		return Redirect('almacen/articulo');
    }

    public function destroy($id)
    {
    	$articulo = Articulo::findOrFail($id);
    	$articulo -> estado = 'Inactivo'; //no muestra mas el articulo
    	$articulo -> update();

    	return Redirect('almacen/articulo');
    }
}
