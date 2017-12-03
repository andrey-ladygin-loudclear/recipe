@extends('layouts.app')

@section('content')
    <div class="receipt-details">
        <h1>{{ $receipt->name }}</h1>
        <div class="description">{{ $receipt->description }}</div>
        
        <div class="ingredients">
            @foreach($receipt->ingredients as $ingredient)
                @include('front.components.icon', ['item' => $ingredient])
            @endforeach    
        </div>
    </div>
@endsection