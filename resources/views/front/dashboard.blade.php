@extends('layouts.app')

@section('content')
    @foreach($receipts as $receipt)
        <div class="receipt">
            <h1>{{ $receipt->name }}</h1>
            <p>{{ $receipt->description }}</p>
        </div>
    @endforeach
@endsection