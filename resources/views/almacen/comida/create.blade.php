@extends('layouts.admin')
@section('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva comida</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach  ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        {!!Form::open(array('url'=>'almacen/comida', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text"  name="name"
                class="form-control" placeholder="Nombre...">         
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text"  name="precio"
                class="form-control" placeholder="Precio...">
            </div>   
            <div class="form-group">
                <label for="idcategoria">Categoria</label>
                <select name="idcategoria" class="form-control">
                    @foreach($categoria as $cat)
                        <option value="{{$cat->idcategoria}}">{{$cat->idcategoria}}</option>
                    @endforeach
                </select>
            </div>   
            <div class="form-group">
                    <button class="btn btn-primary"  type="submit">Guardar </button>
                    <button class="btn btn-danger"  type="reset">Cancelar </button>
            </div>
         {!!Form::close()!!}
      </div>
   
   </div>
@endsection