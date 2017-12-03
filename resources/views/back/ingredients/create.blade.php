@extends('layouts.back')

@section('content')

    <form method="post" action="/admin/ingredients">
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', NULL, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', NULL, ['class' => 'form-control wysiwyg']) }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

@endsection