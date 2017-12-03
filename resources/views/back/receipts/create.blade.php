@extends('layouts.back')

@section('content')

    <form method="POST" action="/admin/receipt/store">
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', NULL, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', NULL, ['class' => 'form-control wysiwyg', 'id' => 'editor']) }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

@endsection