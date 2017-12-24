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
                </h3>
                @if(!empty($receipt->preview))
                    <div class="preview"><img src="{{$receipt->preview}}" alt=""></div>
                @endif
            </div>
        @endforeach
    </div>
@endsection