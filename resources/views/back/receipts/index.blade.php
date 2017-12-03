@extends('layouts.back')

@section('content')
    <h3>Ваши Рецепты</h3>
    @foreach($receipts as $receipt)
        <div class="receipt">
            <h1><a href="/admin/receipts/{{$receipt->id}}/edit"><img src="{{ $receipt->icon->asset() }}" alt=""> {{ $receipt->name }}</a></h1>
            {{--<div class="description">{!! $receipt->description !!}</div>--}}
        </div>
    @endforeach
@endsection