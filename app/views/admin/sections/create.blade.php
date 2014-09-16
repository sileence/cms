@extends('admin/layout')

@section('title')
    New section
@stop

@section('content')

<h1>New section</h1>

{{ Form::open(['url' => 'admin/sections', 'method' => 'POST']) }}

    @include ('admin/sections/partials/fields')

    <p>
        {{ Form::submit('Create section') }}
    </p>

{{ Form::close() }}

@stop