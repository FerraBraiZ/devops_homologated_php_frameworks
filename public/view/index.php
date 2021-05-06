<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Golden AMI - Frameworks</title>
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
              integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
              crossorigin="anonymous">

        <style>

            @import url('https://fonts.googleapis.com/css?family=Ubuntu');

            body {
                font-family: 'Ubuntu', sans-serif !important;
                background: #f0f0f0 !important;
                overflow-x: hidden !important;
                overflow-y: hidden !important;
            }

            .hide{ display: none }

            .jumbotron {
                padding: 2rem;
            }

        </style>

    </head>
    <body>
        <div class="container">
            <br>
            <h1>Golden AMI v0.1</h1>
            <br>
            <div class="jumbotron" style="border: 1px solid #ced4da">
                <h2>Configurações do PHP nesta EC2</h2>
                <br>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/alive">Alive</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/phpinfo">phpInfo, modules, general info</a>
                    </li>
                </ul>
                <br>
                <h2>Lista de frameworks PHP homologados nesta EC2</h2>
                <br>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/laravel6/public/">Laravel 6</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/laravel7/public/">Laravel 7</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/laravel8/public/">Laravel 8</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/codeigniter3/">CodeIgniter 3</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/codeigniter4/public/">CodeIgniter 4</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/phalcon4/public/">Phalcon 4</a>
                    </li>
                </ul>


            </div>
        </div>
    </body>
</html>