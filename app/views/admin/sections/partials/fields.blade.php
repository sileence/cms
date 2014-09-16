    <p>
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}
        {{ $errors->first('name', '<p class="error">:message</p>') }}
    </p>

    <p>
        {{ Form::label('slug_url', 'Slug URL') }}
        {{ Form::text('slug_url') }}
        {{ $errors->first('slug_url', '<p class="error">:message</p>') }}
    </p>

    <p>
        {{ Form::label('type', 'Type') }}
        {{ Form::select('type', ['' => 'Select', 'page' => 'Page', 'blog' => 'Blog']) }}
        {{ $errors->first('type', '<p class="error">:message</p>') }}
    </p>

    <p>
        <label>
            {{ Form::radio('menu', 1) }}
            Show in menu
        </label>
        <label>
            {{ Form::radio('menu', 0) }}
            Don't show in menu
        </label>
        {{ $errors->first('menu', '<p class="error">:message</p>') }}
    </p>

    <p>
        {{ Form::label('menu_order', 'Menu Order') }}
        {{ Form::text('menu_order') }}
        {{ $errors->first('menu_order', '<p class="error">:message</p>') }}
    </p>

    <p>
        <label>
            {{ Form::radio('published', 1) }}
            Published
        </label>
        <label>
            {{ Form::radio('published', 0) }}
            Draft
        </label>
        {{ $errors->first('published', '<p class="error">:message</p>') }}
    </p>