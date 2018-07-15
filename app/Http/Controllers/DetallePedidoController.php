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

class DetallePedidoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
      if($request){
        $query=trim($request->get('searchText'));
        $pedido=DB::table('detalle_pedido as dp')
            ->join('foods as f','dp.idfoods','=','f.idfoods')
            ->join('pedido as p','dp.idpedido','=','p.idpedido')
            ->select('dp.iddetalle_pedido','dp.idpedido','f.name as comida',DB::raw('count(f.idfoods) as cantidad'),DB::raw('f.precio*count(f.idfoods) as Total'))
            ->where('dp.iddetalle_pedido','LIKE','%'.$query.'%')
            ->groupBy('f.name','dp.idpedido','f.precio','dp.iddetalle_pedido')
            ->paginate(7);
       return view('pedido.orden.index',["pedido" =>$pedido,"searchText"=>$query]);
      }
    }
}
