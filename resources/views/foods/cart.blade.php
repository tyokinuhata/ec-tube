@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h1">カート</h1>
        <table class="table">
            @foreach ($carts as $cart)
                <tr>
                    <td>
                        <img src="{{ url($cart->food->img) }}" alt="">
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
        <button class="btn btn-primary">おあいそ</button>
    </div>
@endsection