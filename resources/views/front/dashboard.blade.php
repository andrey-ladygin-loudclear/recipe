@extends('layouts.app')

@section('content')
    <div class="receipts">
        @foreach($receipts as $receipt)
            <div class="receipt">
                <h3>
                    <a href="/receipts/{{ $receipt->id }}">
                        <img src="{{ App\Helpers\IconHelper::asset($receipt->icon) }}" alt="">
                        {{ $receipt->name }}
                    </a>

                    @if (Auth::check())
                        @if (Auth::id() == $receipt->user_id)
                            <a href="/admin/receipts/{{$receipt->id}}/edit" title="Редактировать"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        @endif
                        <a href="/receipts/purchases/{{$receipt->id}}" title="Добавить в список покупок"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
                    @endif
                </h3>
                @if(!empty($receipt->preview))
                    <div class="preview"><img src="{{$receipt->preview}}" alt=""></div>
                @endif
            </div>
        @endforeach
    </div>
@endsection