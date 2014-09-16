<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <h1>Editando noticia {{ $id }}</h1>

    {{ Form::open(['route' => ['admin.news.destroy', $id], 'method' => 'DELETE']) }}

        <button type="submit">Actualizar noticia</button>

    {{ Form::close() }}
</body>
</html>