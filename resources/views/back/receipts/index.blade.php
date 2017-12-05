@extends('layouts.back')

@section('content')
    <h3>Ваши Рецепты</h3>
    @foreach($receipts as $receipt)
        <div class="receipt">
            <h1>
                <a href="/admin/receipts/{{$receipt->id}}/edit">
                    <img src="{{ App\Helpers\IconHelper::asset($receipt->icon) }}" alt="">
                    {{ $receipt->name }}
                </a>
            </h1>
            @if(!empty($receipt->preview))
                <div class="preview"><img src="{{$receipt->preview}}" alt=""></div>
            @endif
            {{--<div class="description">{!! $receipt->description !!}</div>--}}
        </div>
    @endforeach
@endsection