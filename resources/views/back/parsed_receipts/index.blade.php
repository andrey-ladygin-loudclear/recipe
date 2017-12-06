@extends('layouts.back')

@section('content')
    <h3>Новые Рецепты</h3>
    @foreach($receipts as $receipt)
        <div class="receipt">
            <h1>
                <a href="{{$receipt->link}}" target="_blank">
                    {{ $receipt->name }}
                </a>
            </h1>
            @if(!empty($receipt->preview))
                <div class="preview"><img src="{{$receipt->preview}}" alt=""></div>
            @endif
        </div>
    @endforeach
@endsection