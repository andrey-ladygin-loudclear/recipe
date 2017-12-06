@extends('layouts.back')

@section('content')
    <h3>Список покупок</h3>
    @foreach($purchases as $purchase)
        <div class="purchase">
            {{$purchase->id}}
        </div>
    @endforeach
@endsection