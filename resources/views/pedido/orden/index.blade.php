@extends('layouts.admin')
@section('contenido')
<div  class="row">
    <div class="col-lg-8  col-md-8 col-sm-8 col-xs-12">
        <h3>Detalle de Pedido </h3> 
        @include('pedido.orden.search')  
    </div>   
</div> 

<div  class="row">
    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table  class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Mesa</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                    <th>Comida</th>
                </thead>
            @foreach ($pedido as $ped)
                <tr>
                    <td>{{ $ped->idpedido}}</td>
                    <td>{{ $ped->idmesa}}</td>
                    <td>{{ $ped->fecha}}</td>
                    <td>{{ $ped->precio}}</td>
                    <td>{{ $ped->comida}}</td>
                </tr>  
            @endforeach
            </table>
        </div>
        {{$pedido -> render()}}
    </div>   
</div>
<button type="submit" class="btn btn-primary">Imprimir</button>
@endsection