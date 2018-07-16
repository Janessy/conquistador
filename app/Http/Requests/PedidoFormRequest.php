<?php

namespace conquistador\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idmesa' => 'max:3',
            'fecha' => 'date',
            'precio' => 'max:10',
            'idfoods' => 'required|max:3'
            
        ];
    }
}
