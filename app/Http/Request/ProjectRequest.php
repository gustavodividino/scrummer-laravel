<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date', //Verificar o formato da Data
        ];
    }

    public function messages() {

        return [
            'name.required' 				=> 'O nome do projeto é obrigatorio',
            'description.required' 	=> 'A descrição do projeto é obrigatório',
            'after' => 'A data final deve ser maior que a data de início '
        ];
    }

}
