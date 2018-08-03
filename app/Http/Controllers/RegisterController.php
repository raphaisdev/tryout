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
}
