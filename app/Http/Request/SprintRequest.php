<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SprintRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {

        return [
            'name' => 'required',
            'id_project' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date', //Verificar o formato da DataVerificar o formato da Data
            'productsbacklog' => 'required'
        ];
    }

    public function messages() {

        return [
            'name.required' => 'O nome da sprint é obrigatorio',
            'numeric' => 'O :attribute deve ser numérico',
            'after' => 'A data fim deve ser maior que a data de início '
        ];
    }

}
