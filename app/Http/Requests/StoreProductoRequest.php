<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StoreProductoRequest extends FormRequest
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
            'numero_rastreo' => ['required', 'unique:producto', 'max:255'],
            'nombre' => 'required',
            'url' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'numero_rastreo.required' => 'El número de rastreo es requerido',
            'numero_rastreo.unique' => 'Número de rastreo registrado',
            'numero_rastreo.max' => 'Longitud máxima es de 255 caracteres',
            'nombre.required' => 'El nombre del producto es requerido',
            'url.required' => 'La url es requerida',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        // $response = new Response(['error' => $validator->errors()->first()], 422);
        // $response = new Response(['error' => $validator->errors()], 422);
        // throw new ValidationException($validator, $response);
        throw new HttpResponseException(response()->json(['error' => $validator->errors()], 422));
    }
}
