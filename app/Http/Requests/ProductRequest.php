<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    
    public function rules()
    {
        return [
            'title'=> ['required','max:255'],
            'description'=> ['required','max:1000'],
            'price'=> ['required','min:1'],
            'stock'=> ['required','min:0'],
            'status'=> ['required','in:available,unavailable'],

        ];
    }

    public function withValidator($validator)
    {
            //sesiones para guardar los datos available->'diponiobles' y  unavailable:'no disponibles'
        $validator->after(function ($validator) {
            if($this->status =='available' && $this->stock == 0){
                    $validator->errors()->add('stock','El stock es obligatorio cuando el producto esta disponible');
            }
        });
    }

    public function messages()
    {
        return [
            'title.required' => 'El campo titulo es obligatorio',
            'description.required' => 'El campo descripcion es obligatorio',
            'price.required' => 'El campo precio es obligatorio',
            'stock.required' => 'El campo stock es obligatorio',
            'status.required' => 'El campo estado es obligatorio',
        ];
    }
}
