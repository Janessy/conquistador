<?php

namespace conquistador\Http\Controllers;

use Illuminate\Http\Request;
use conquistador\Http\Requests; 
use conquistador\Models\Pedido;
use conquistador\Models\DetallePedido;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use conquistador\Http\Request\PedidoFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidosController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
      if($request){
        $query=trim($request->get('searchText'));
        $pedido=DB::table('pedido as p')
            ->join('detalle_pedido dp','p.idpedido','=','dp.idpedido')
            ->select('p.idpedido','p.idmesa','p.fecha','p.comprobante','p.num_comprobante','p.fecha_hora','p.total_venta','p.estado')
            ->where('p.num_comprobante','LIKE','%'.$query.'%')
            ->paginate(7);
       return view('pedidos.orden.index',["categorias" =>$pedido,"searchText"=>$query]);
      }
    }

    public function create()
    {
        return view("almacen.categoria.create");
    }

    public function store(CategoriaFormRequest $request )
    {
       $categoria= new Categoria;
       $categoria -> nombre=$request ->get('nombre');
       $categoria -> descripcion=$request ->get('descripcion');
       $categoria -> condicionl='1';
       $categoria ->save();
       return Redirect::to('almacen/categoria');
    }

    public function show($id)
    {
        return view("almacen.categoria.show",["categoria" =>Categoria::findOrFail($id)]);

    }

    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria" =>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request -> get('nombre');
        $categoria->descripcion=$request -> get('descripcion');
        $categoria-> update();
        return Redirect::to('almacen/categoria');

    }

    public function destroy($id)
    {
      $categoria=Categoria::finOrFail($id);
      $categoria->condicion='0';
      $categoria->update();
      return Redirect::to('almacen/categoria');

    }
}
