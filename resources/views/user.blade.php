@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="h3">ユーザ情報</div>
        <div class="jumbotron">
            <div class="">ユーザ名: {{ $user->name }}</div>
            <div class="">メールアドレス: {{ $user->email }}</div>
            <div class="">ユーザ名: {{ $user->name }}</div>
            <div class="">郵便番号: {{ $user->zip }}</div>
            <div class="">住所: {{ $user->address }}</div>
            <div class="">登録日: {{ $user->created_at }}</div>
        </div>
    </div>
@endsection