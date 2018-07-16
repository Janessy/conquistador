@extends('layouts.admin')
@section('contenido')
<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Pedido</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach  ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        {!!Form::open(array('url'=>'pedido/orden', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="idmesa">Mesa</label>
            <select name="idmesa" class="form-control">
                @foreach($mesa as $mes)
                    <option value="{{$mes->idmesa}}">{{$mes->mesa}}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group">
            <label for="idfoods">Comida</label>
            <select name="idfoods" class="form-control">
                @foreach($comida as $com)
                    <option value="{{$com->idfoods}}">{{$com->name}}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group">
            <button class="btn btn-primary"  type="submit">Guardar </button>
            <button class="btn btn-danger"  type="reset">Cancelar </button>
        </div>  
@endsection