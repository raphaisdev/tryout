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
            'nome' => ['required', 'regex:/([a-zA-Z]+\s?\b){2,}/'],
            'senha' => ['required', 'regex:/(?=.*[a-zA-Z])(?=.*\d)(?=.*\W).{7,}$/'],
            'telefone' => 'required',
            'email'=> 'required|email',
            'confirmacao_email'=> 'same:email'
        ], [
            'nome.required' => 'Você precisa fornecer o seu nome e seu sobrenome.',
            'nome.regex' => 'Em seu nome, somente letras e espaços são aceitos. Ex.: John Doo',
            'senha.required' => 'Você precisa fornecer uma senha.',
            'senha.regex' => 'Sua senha deve possuir pelo menos 7 caracteres, contendo ao menos 1 número e uma pontuação.',
            'telefone.required' => 'Você precisa fornecer o seu telefone.',
            'email.required' => 'Você precisa fornecer seu email.',
            'email.email' => 'Você precisa fornecer um email válido.',
            'confirmacao_email.same' => 'Não foi possível confirmar seu email.',
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
