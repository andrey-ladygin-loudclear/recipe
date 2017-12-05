@extends('layouts.back')

@section('content')
    <h2>All ingredients</h2>
    @foreach($ingredients as $ingredient)
        <div class="receipt">
            <h1>
                <a href="/admin/ingredients/{{$ingredient->id}}/edit">
                    <img src="{{ App\Helpers\IconHelper::asset($ingredient->icon) }}" alt="">
                    {{ $ingredient->name }}
                </a>
            </h1>
        </div>
    @endforeach
@endsection