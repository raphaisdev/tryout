<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tryout</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #333;
                font-family: 'Montserrat', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .myform {
                font-weight: bold;
                margin:20px auto;
                width: 600px;
            }
            .alert {
                background-color: #faa;
                border: 2px solid red;
                font-size: 13px;
                line-height: 150%;
                padding: 10px;
            }
            input {
                font-family: sans-serif;
                font-size: 13px;
                background-color: #f0f0f0;
                border: 1px solid #999;
                padding: 4px;
            }
            input[type=submit] {
                background-color: #999;
                color: #fff;
                font-weight: bold;
                font-size: 16px;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <div class="myform">

        @if ($errors->any())
            <div class="alert">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

            <form action="/save" enctype="multipart/form-data" method="post" target="_self">
                <p>Nome Completo:<br>
                    <input type="text" name="nome" placeholder="John Doo" value="{{ old('nome') }}"></p>
                <p>E-mail:<br>
                    <input type="text" name="email" value="{{ old('email') }}"></p>
                <p>Confirmação de e-mail:<br>
                    <input type="text" name="confirmacao_email" value="{{ old('confirmacao_email') }}"></p>
                <p>Senha:<br>
                    <input type="password" name="senha" placeholder="abcde;7"></p>
                <p>Telefone:<br>
                    <input type="text" name="telefone" placeholder="+XX (XX) XXXXX-XXXX" value="{{ old('telefone') }}"></p>
                <p><input type="submit" value="Enviar"></p>
            </form>

        </div>
    </body>
</html>
