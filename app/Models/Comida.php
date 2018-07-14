<?php

namespace conquistador\Models;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table='foods'; /*hace referencia a la tabla */
    protected $primaryKey='idfoods'; /*la llave primaria */ 
    public $timestamps= false; /*con el false le  decimos que no se agregen esas columnas de creacion y actualizacion del registro  */

    protected $fillable=[   /*aqui especificamos los atributos*/
        'name',
        'precio',
        'idcategoria'
    ];

    protected $guarded =[

    ];
}
