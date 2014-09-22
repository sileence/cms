
{{ Form::model(Input::all(), ['route' => 'admin.sections.index', 'method' => 'GET']) }}

    {{ Form::text('search') }}
    {{ Form::select('published', ['' => 'Select status', '0' => 'Draft', '1' => 'Published']) }}
    {{ Form::select('menu', ['' => 'Menu status', '0' => 'Not in menu', '1' => 'Show in menu']) }}
    {{ Form::button('Filter sections', ['type' => 'submit', 'class' => 'btn btn-primary']) }}

{{ Form::close() }}