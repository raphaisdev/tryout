<?php

namespace App\Http\Controllers;

use App\Models\TryoutModel;
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
            'telefone' => ['required', 'regex:/^(?:(?:\+|00)?\d{2}\s?)?(?:\(?([\d][\d])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/'],
            'email'=> 'required|email|unique:tryout',
            'confirmacao_email'=> 'same:email'
        ], [
            'nome.required' => 'Você precisa fornecer o seu nome e seu sobrenome.',
            'nome.regex' => 'Em seu nome, somente letras e espaços são aceitos. Ex.: John Doo',
            'senha.required' => 'Você precisa fornecer uma senha.',
            'senha.regex' => 'Sua senha deve possuir pelo menos 7 caracteres, contendo ao menos 1 número e uma pontuação.',
            'telefone.required' => 'Você precisa fornecer o seu telefone.',
            'telefone.regex' => 'O número de telefone deve seguir algum desses formatos: +XX (XX) XXXXX-XXXX / XXXX-XXXX / XX XXXX-XXXX / XXXXXXXXXXXXX',
            'email.required' => 'Você precisa fornecer seu email.',
            'email.email' => 'Você precisa fornecer um email válido.',
            'email.unique' => 'O e-mail informado já está cadastrado.',
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

        TryoutModel::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ]);

        return view('success');
    }
}
