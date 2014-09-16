<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    {{ Form::open(['route' => 'admin.news.store', 'method' => 'POST']) }}

        <button type="submit">Enviar Formulario</button>

    {{ Form::close() }}
</body>
</html>