@extends('layouts.app')

@section('content')
    @foreach($items as $item)
        <img src="{{ $item->img }}" alt="">
        <p>{{ $item->name }}</p>
        <p>{{ $item->description }}</p>
    @endforeach
@endsection