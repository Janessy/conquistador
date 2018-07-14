<!--se ava a agregar un forumulario con sus parametros 
la url para que envie la informacion ala pagina index
metodo de envio es el Get , en el parametro autocomplete que e
esta apagado y el role del formulario que es el search
GET:index,create,show,edit
POST:store
PUT:update
DELETE:destroy
PATCH:update

)-->

{!! Form::open(array('url'=>'almacen/categoria',
 'method'=>'GET', 'autocomplete'=>'off' ,'role'=>'search'))!!}
 <div   class="form-group">
   <div class="input-group">
     <input type="text"  class="form-control"  name="searchText" placeholder="Buscar.."  value="{{$searchText}}">
    <span  class="input-group-btn">  
           <button type="submit" class="btn btn-primary">Buscar</button>
    </span>
   </div>
 </div>

 {{Form::close()}}