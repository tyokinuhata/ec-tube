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
                    <td>{{ $cart->number }}</td>
                    <td>{{ $cart->food->price }}円</td>
                </tr>
            @endforeach
            <tr>
                <td>合計</td>
                <td></td>
                <td></td>
                <td>円</td>
            </tr>
        </table>
        <button class="btn btn-primary">おあいそ</button>
    </div>
@endsection