@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($items as $item)
            <div class="">
                <img src="{{ $item->img }}" alt="">
                <p>{{ $item->name }}</p>
                <p>{{ $item->description }}</p>
                <a href="{{ '/items/' . $item->id }}" class="btn btn-primary">Detail</a>
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
        @endforeach
    </div>
@endsection