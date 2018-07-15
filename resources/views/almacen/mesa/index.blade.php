@extends('layouts.admin')
@section('contenido')
<div  class="row">
       <div class="col-lg-8  col-md-8 col-sm-8 col-xs-12">
            <h3> Mesas <a href="mesa/create"> <button class="btn btn-success">Nuevo</button></a></h3>
                @include('almacen.comida.search')
       </div>   
</div> 

<div  class="row">
    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table  class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Mesa</th>
                    <th>Opciones</th>
                </thead>
            @foreach ($mesa as $mes)
                <tr>
                    <td>{{ $mes->idmesa}}</td>
                    <td>{{ $mes->mesa}}</td>
                    <td>
                        <a href="{{URL::action('MesaController@edit',$mes->idmesa)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$mes->idmesa}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>                          
                    </td>
                </tr>
            @include('almacen.mesa.modal')   
            @endforeach
            </table>
        </div>
        {{$mesa -> render()}}
    </div>   
</div>


 @endsection