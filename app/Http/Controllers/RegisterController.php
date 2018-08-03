<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        print_r($request->all());
    }
}
