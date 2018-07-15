<?php

namespace conquistador\Http\Controllers;

use Illuminate\Http\Request;
use conquistador\Models\Comida;
use Illuminate\Support\Facades\Redirect;
use conquistador\Http\Requests\ComidaFormRequest;
use DB;

class ComidaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
      if($request){
        $query=trim($request->get('searchText'));
        $comida=DB::table('foods')
            ->where('name','LIKE','%'.$query.'%')
            ->orderBy('idfoods','asc')
            ->paginate(7);
       return view('almacen.comida.index',["comida" =>$comida,"searchText"=>$query]);
      }
    }

    public function create()
    {
        return view("almacen.comida.create");
    }

    public function store(ComidaFormRequest $request )
    {
        $comida= new Comida;
        $comida->name=$request ->get('name');
        $comida->precio=$request ->get('precio');
        $comida->idcategoria=$request ->get('idcategoria');
        $comida->save();
       return Redirect::to('almacen/comida');
    }

    public function show($id)
    {
        return view("almacen.comida.show",["comida" =>Comida::findOrFail($id)]);

    }

    public function edit($id)
    {
        return view("almacen.comida.edit",["comida" =>Comida::findOrFail($id)]);
    }

    public function update(ComidaFormRequest $request,$id)
    {
        $comida=Comida::findOrFail($id);
        $comida->name=$request -> get('name');
        $comida->precio=$request -> get('precio');
        $comida->idcategoria=$request ->get('idcategoria');
        $comida-> update();
        return Redirect::to('almacen/comida');

    }

    public function destroy($id)
    {
        $comida=Comida::finOrFail($id);
        $comida->update();
      return Redirect::to('almacen/comida');

    }
}
