<?php

namespace conquistador\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table='mesa'; /* hace referencia a la tabla */
    protected $primaryKey='idmesa'; /* la llave primaria */ 
    public $timestamps= false; /* con el false le  decimos que no se 
    agregen esas columnas de creacion y actualizacion del registro  */

    protected $fillable=[   /*  aqui especificamos los atributos*/
        'mesa'
    ];

    protected $guarded =[

    ];
}
