@extends('layouts.app')

@section('content')
    <div class="receipts">
        @foreach($receipts as $receipt)
            <div class="receipt">
                <h3><a href="/receipts/{{ $receipt->id }}">{{ $receipt->name }}</a></h3>
                <p>{{ $receipt->description }}</p>
            </div>
        @endforeach
    </div>
@endsection