@extends('admin/layout')

@section('content')

<h1>Sections</h1>

<p>
    <a href="{{ url('admin/sections/create') }}">
        Add a new section
    </a>
</p>

@include('admin/sections/partials/filters')

@if($sections->getTotal())

    <p>
    There are {{ $sections->getTotal() }} sections, showing page {{ $sections->getCurrentPage() }} of {{ $sections->getLastPage() }}
    </p>

    @include('admin/sections/partials/table')

    {{ $sections->links() }}

@else

    <h4>
    There are no sections, please create the first one
    </h4>

@endif

@stop