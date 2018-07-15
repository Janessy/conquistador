<?php

namespace conquistador\Http\Controllers;

use Illuminate\Http\Request;
use conquistador\Models\Mesa;
use Illuminate\Support\Facades\Redirect;
use conquistador\Http\Requests\MesaFormRequest;
use DB;

class MesaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
      if($request){
        $query=trim($request->get('searchText'));
        $mesa=DB::table('mesa')
            ->where('mesa','LIKE','%'.$query.'%')
            ->paginate(5);
       return view('almacen.mesa.index',["mesa" =>$mesa,"searchText"=>$query]);
      }
    }

    public function create()
    {
        return view("almacen.mesa.create");
    }

    public function store(MesaFormRequest $request )
    {
       $mesa= new Mesa;
       $mesa->mesa=$request ->get('mesa');
       $mesa->save();
       return Redirect::to('almacen/mesa');
    }

    public function show($id)
    {
        return view("almacen.mesa.show",["mesa" =>Mesa::findOrFail($id)]);

    }

    public function edit($id)
    {
        return view("almacen.mesa.edit",["mesa" =>Mesa::findOrFail($id)]);
    }

    public function update(MesaFormRequest $request,$id)
    {
        $mesa=Mesa::findOrFail($id);
        $mesa->mesa=$request -> get('mesa');
        $mesa-> update();
        return Redirect::to('almacen/mesa');

    }

    public function destroy($id)
    {
      $mesa=Mesa::findOrFail($id);
      $mesa->condicion='0';
      $mesa->update();
      return Redirect::to('almacen/mesa');

    }
}
