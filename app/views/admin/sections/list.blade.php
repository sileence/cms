@extends('admin/layout')

@section('content')

<h1>Sections</h1>

<p>
    <a href="{{ url('admin/sections/create') }}">
        Add a new section
    </a>
</p>
@stop