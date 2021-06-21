<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductBacklogRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id_project' => 'required',
            'name' => 'required',
            'description' => 'required',
            'pokerplainpoint' => 'required|numeric',
            'responsavel' => 'required'
        ];
    }

    public function messages() {

        return [
            'id_project.required' 				=> 'É necessáiro escolher um projeto',
            'name.required' 					=> 'O nome do productbacklog é obrigatorio',
            'description.required' 		=> 'A descrição do productbacklog é obrigatório',
            'pokerplainpoint.required' => 'É necessário colocar um valor para o Poker Plan Point',
            'responsavel.required' 		=> 'É necessário escolher um responsável para o ProductBacklog',
            'pokerplainpoint.numeric' =>  'O campo Poker Plain Point deve ser numérico'
        ];
    }

}
