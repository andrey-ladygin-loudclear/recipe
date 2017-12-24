@extends('layouts.app')

@section('content')
    <div class="receipt-details">
        <div class="panel panel-default">

            <!-- Table -->
            <table class="table">
                <tr>
                    <td width="20px">#</td>
                    <td colspan="2"><b>Надо купить</b></td>
                </tr>
                @forelse($purchases as $c => $purchase)
                    @if(!$purchase->bought)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <img src="{{ \App\Helpers\IconHelper::asset($purchase->icon) }}" alt="{{ $purchase->ingredient }}" title="{{ $purchase->ingredient }}">
                                - {{$purchase->ingredient}}, {{$purchase->notes}}
                            </td>
                            <td>
                                <a href="/purchases/buy/{{$purchase->id}}" class="btn btn-success">Куплено</a>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="3">У вас пуст список покупок</td>
                    </tr>
                @endforelse

            </table>
        </div>

        @if(!$purchases->isEmpty())
            <div class="panel panel-default">

                <!-- Table -->
                <table class="table">
                    <tr>
                        <td width="20px">#</td>
                        <td colspan="2"><b>Куплено</b></td>
                    </tr>
                    @foreach($purchases as $c => $purchase)
                        @if($purchase->bought)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ \App\Helpers\IconHelper::asset($purchase->icon) }}" alt="{{ $purchase->ingredient }}" title="{{ $purchase->ingredient }}">
                                    - <del>{{$purchase->ingredient}}, {{$purchase->notes}}</del>
                                </td>
                                <td>
                                    <a href="/purchases/add_to_purchases/{{$purchase->id}}" class="btn btn-danger">Не куплено</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </table>
            </div>
        @endif

        <p>
            <a href="/purchases/add" class="btn btn-success">Добавить в список покупок</a>
            <a href="/purchases/clear" class="btn btn-warning">Очистить список покупок</a>
        </p>
    </div>
@endsection