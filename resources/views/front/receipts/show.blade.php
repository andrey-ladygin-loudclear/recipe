@extends('layouts.app')

@section('content')
    <div class="receipt-details">
        <h1>{{ $receipt->name }}</h1>
        <div class="description">{!! $receipt->description !!}</div>
        
        <div class="ingredients">
            @foreach($receipt->ingredients as $ingredient)
                <p>
                    @include('front.components.icon', ['item' => $ingredient]) - {{$ingredient->name}}
                </p>
            @endforeach    
        </div>

        <a href="/receipts/purchases/{{$receipt->id}}}" class="btn btn-info">Добавить ингредиенты в список покупок</a>
    </div>
@endsection