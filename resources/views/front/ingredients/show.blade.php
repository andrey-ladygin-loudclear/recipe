@extends('layouts.app')

@section('content')
    <div class="ingredient-details">
        <h1>{{ $ingredient->name }}</h1>
        <div class="description">{{ $ingredient->description }}</div>
    </div>
@endsection