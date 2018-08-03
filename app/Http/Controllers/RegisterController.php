<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    /**
    * Método para a exibição da view do formulário
    */
    public function form()
    {
        return view('form');
    }

    /**
    * Método para salvar os dados do formulário
    */
    public function save(Request $request)
    {
        //valida os dados recebidos no formulario
        $validate = Validator::make($request->all(), [
            'nome' => 'required',
            'senha' => 'required',
            'telefone' => 'required',
            'email'=> 'required|email',
            'confirmacao_email'=> 'same:email'
        ]);

        //caso não passe por alguma regra
        if ($validate->fails()) {
            //redireciona para o formulário
            return redirect('/')
            //com os dados recebidos
                ->withInput()
            //e os erros encontrados
                ->withErrors($validate);
        }

        print_r($request->all());
    }
}
