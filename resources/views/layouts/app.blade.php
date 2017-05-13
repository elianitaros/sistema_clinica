<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('ely.base.title') }} | Ingresar</title>

    {!! Html::style('vendor/adminlte/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('vendor/clinica/font-awesome/css/font-awesome.min.css') !!}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    

    @yield('content')

    {!! Html::script('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js')!!}
    {!! Html::script('vendor/adminlte/bootstrap/js/bootstrap.min.js')!!}
</body>
</html>
