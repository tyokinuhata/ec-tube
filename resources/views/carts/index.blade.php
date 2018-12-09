@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($carts) === 0)
            <p class="text-center h3">まだ食べてません</p>
        @else
            <table class="table">
                @foreach ($carts as $cart)
                    <tr>
                        <td>
                            <img src="{{ url($cart->food->img) }}" alt="" width="150">
                        </td>
                        <td>{{ $cart->food->name }}</td>
                        <td>{{ $cart->number }}皿</td>
                        <td>{{ $cart->food->price * $cart->number }}円</td>
                    </tr>
                @endforeach
                <tr>
                    <td>合計</td>
                    <td></td>
                    <td></td>
                    <td>{{ $carts->total_price }}円</td>
                </tr>
            </table>
            <form method="POST" action="{{ url('carts/oaiso') }}">
                @csrf
                <input type="hidden" name="total_price" value="{{ $carts->total_price }}">
                <button class="btn btn-primary">おあいそ</button>
            </form>
        @endif
    </div>
@endsection