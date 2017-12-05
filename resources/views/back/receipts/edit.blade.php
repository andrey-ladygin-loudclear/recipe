@extends('layouts.back')

@section('content')

    <form method="post" action="/admin/receipts" enctype="multipart/form-data">
        {{ Form::token() }}
        {{ Form::hidden('id', $receipt->id ?? '') }}

        <div class="form-group">
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name', $receipt->name ?? old('name'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('preview', 'Картинка готового блюда:') }}
            {{ Form::file('preview', ['class' => 'form-control']) }}
        </div>

        @include('back.components.select-icon-form-group', ['icon' => $receipt->icon ?? old('icon'), 'model' => new \App\Model\Ingredient()])

        <div class="form-group">
            {{ Form::label('description', 'Описание:') }}
            {{ Form::textarea('description', $receipt->description ?? old('description'), ['class' => 'form-control wysiwyg']) }}
        </div>

        @include('back.components.select-ingredients', ['ingredients' => $receipt->ingredients ?? []])

        <div class="form-group">
            {{ Form::label('cooking_time', 'Время приготовления (в минутах):') }}
            {{ Form::number('cooking_time', $receipt->cooking_time ?? old('cooking_time'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('author', 'Автор:') }}
            {{ Form::text('author', $receipt->author ?? old('name') ?? auth()->user()->name, ['class' => 'form-control']) }}
            <!-- check if old value saved after validation fail -->
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>

    </form>

@endsection