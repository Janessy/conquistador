@extends('layouts.admin')
@section('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva mesa</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach  ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif 
        {!!Form::open(array('url'=>'almacen/mesa', 'method'=>'POST','autocomplete'=>'off'))!!}

        {{Form::token()}}
            <div class="form-group">
                <label for="mesa">Mesa</label>
                <input type="text"  name="mesa"
                class="form-control" placeholder="Nº de mesa...">         
            </div>  
            <div class="form-group">
                    <button class="btn btn-primary"  type="submit">Guardar </button>
                    <button class="btn btn-danger"  type="reset">Cancelar </button>
            </div>
         {!!Form::close()!!}
      </div>
   
   </div>
@endsection