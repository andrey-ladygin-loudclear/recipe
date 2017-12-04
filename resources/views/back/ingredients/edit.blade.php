@extends('layouts.back')

@section('content')

    <form method="post" action="/admin/ingredients">
        {{ Form::token() }}
        {{ Form::hidden('id', $ingredient->id ?? '') }}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $ingredient->name ?? old('name'), ['class' => 'form-control']) }}
        </div>

        @include('back.components.select-icon-form-group', ['icon' => $ingredient->icon ?? old('icon'), 'model' => new \App\Model\Ingredient()])

        <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', $ingredient->description ?? old('description'), ['class' => 'form-control wysiwyg']) }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>

    </form>

@endsection