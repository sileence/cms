<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>New section</h1>

{{ Form::open(['url' => 'admin/sections', 'method' => 'POST']) }}

    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}

    {{ Form::label('slug_url', 'Slug URL') }}
    {{ Form::text('slug_url') }}

    {{ Form::label('type', 'Type') }}
    {{ Form::text('type') }}

    {{ Form::submit('Create section') }}

{{ Form::close() }}

</body>
</html>