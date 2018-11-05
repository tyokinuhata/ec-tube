@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($items as $item)
                <div class="m-2">
                    <img src="{{ $item->img }}" alt="">
                    <p class="h4 mt-2">{{ $item->name }}</p>
                    <p>{{ $item->description }}</p>
                    <a href="{{ '/items/' . $item->id }}" class="btn btn-primary">Detail</a>
                    <form method="POST" action="{{ url('/items/add') }}" class="d-inline">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $item->id }}" name="item">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection