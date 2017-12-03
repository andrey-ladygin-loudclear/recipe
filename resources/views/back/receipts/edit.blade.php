@extends('layouts.back')

@section('content')

    <form method="post" action="/admin/receipts">
        {{ Form::token() }}

        <div class="form-group">
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name', $name ?? old('name'), ['class' => 'form-control']) }}
        </div>

        @include('back.components.select-icon-form-group', ['icon' => $icon ?? old('icon'), 'dir' => \App\Model\Receipt::$dir])

        <div class="form-group">
            {{ Form::label('description', 'Описание:') }}
            {{ Form::textarea('description', $description ?? old('description'), ['class' => 'form-control wysiwyg']) }}
        </div>

        @include('back.components.select-ingredients', [])

        <div class="form-group">
            {{ Form::label('author', 'Автор:') }}
            {{ Form::text('author', $name ?? old('name') ?? auth()->user()->name, ['class' => 'form-control']) }}
            <!-- check if old value saved after validation fail -->
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>

    </form>

@endsection