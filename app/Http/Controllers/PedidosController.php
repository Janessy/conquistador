<?php

namespace conquistador\Http\Controllers;

use Illuminate\Http\Request;
use conquistador\Models\Pedido;
use Illuminate\Support\Facades\Redirect;
use conquistador\Http\Requests\PedidoFormRequest;
use DB;

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
            ->join('mesa as m','p.idmesa','=','m.idmesa')
            ->join('foods as f','p.idfoods','=','f.idfoods')
            ->select('p.idpedido','m.idmesa','p.fecha','f.precio as precio','f.name as comida')
            ->where('p.idpedido','LIKE','%'.$query.'%')
            ->paginate(6);
       return view('pedido.orden.index',["pedido" =>$pedido,"searchText"=>$query]);
      }
    }

    public function create()
    {
        $categoria=DB::table('categoria')->where('condicion','=','1')->get();
        $comida=DB::table('foods');
        $mesa=DB::table('mesa');
        return view("pedido.orden.create",["categoria"=>$categoria,"comida"=>$comida,"mesa"=>$mesa]);
    }

    public function store(ComidaFormRequest $request )
    {
        $pedido= new Pedido;
        $pedido->idmesa=$request ->get('idmesa');
        $pedido->fecha=$request ->get('fecha');
        $pedido->precio=$request ->get('precio');
        $pedido->comida=$request ->get('comida');
        
        $pedido->save();
       return Redirect::to('pedido/orden');
    }

}
