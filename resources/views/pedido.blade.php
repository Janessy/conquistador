@extends('layouts.waiter')
@section('contenido')
<div  class="row">
    <div class="col-lg-8  col-md-8 col-sm-8 col-xs-12">
        <h3>Carta</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach  ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
                <label for="idcategoria">Nº de mesa</label>
                <select name="mesa" class="form-control">
                    @foreach($mesa as $mes)
                        <option value="{{$cat->idmesa}}">{{$cat->idmesa}}</option>
                    @endforeach
                </select>
            </div> 
    </div>   
</div>
<div  class="row">
    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
    <h3>Pedido</h3>
        <div class="table-responsive">
            <table  class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nº de mesa</th>
                    <th>Categoria</th>
                    <th>Comida</th>
                    <th>Cantidad</th>
                </thead>
            </table>
        </div>
    </div>   
</div>
@endsection